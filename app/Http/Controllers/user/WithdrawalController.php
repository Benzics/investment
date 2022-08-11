<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\Wallet;
use App\Models\Currency;
use App\Models\Setting;

class WithdrawalController extends Controller
{
    /**
     * Currency symbol enabled in settings
     */
    private $currency;

    /**
     * Currency short code in settings
     */
    private $currency_short;

    public function __construct()
    {
        $site_currency = Setting::where('name', 'currency')->firstOrFail();
        $currency = Currency::findOrFail($site_currency->value);

        $this->currency = $currency->symbol;
        $this->currency_short = $currency->short_code;
    }
    public function index()
    {
        // rettrieve the withdrawal settings 
        $minimum_withdrawal = Setting::where('name', 'minimum-withdrawal')->firstOrFail()->value;
        $maximum_withdrawal = Setting::where('name', 'maximum-withdrawal')->firstOrFail()->value;
        $processing_time = Setting::where('name', 'withdrawal-time')->firstOrFail()->value;
        $withdrawal_charge = Setting::where('name', 'withdrawal-charges')->firstOrFail();
        $wth_charge = json_decode($withdrawal_charge->value);

        $payments = Payment::where('status', '1')->get();
        $title = 'Withdrawal';
        $page_title = 'Withdrawal Request';
        $currency = $this->currency;

        $currency_short = $this->currency_short;

        $charge = ($wth_charge->type == 0) ? $wth_charge->amount . '%' : $currency_short . $wth_charge->amount;

        $payment_ids = [];

        foreach($payments as $row)
        {
            $payment_ids[] = '#payment-method'. $row->id;
        }

        $payment_string = implode(',', $payment_ids);

        return view('user.withdraw', compact('payments', 'title', 'page_title', 'payment_string', 'currency', 'currency_short',
            'charge', 'processing_time', 'minimum_withdrawal', 'maximum_withdrawal'));
    }

    public function withdraw(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required|min:1',
            'payment_id' => 'required',
        ]);

        $user = auth()->user();
        $wallet = Wallet::where('user_id', $user->id)->latest()->first();

        $charges = 0;

        $balance = ($wallet) ? $wallet->balance : 0;

        $debit = $validate['amount'] + $charges;

        if($balance < $debit)
        {
            return back()->withErrors(['amount' => 'Amount specified is less than your available balance!']);
        }

        $desc = 'Debit for withdrawal of ' . $this->currency_short . number_format($validate['amount'], 2) . ', with charges of ' . $this->currency_short . number_format($charges, 2);

        // debit user 
        Wallet::create([
            'user_id' => $user->id,
            'debit' => $debit,
            'description' => $desc,
            'balance' => $balance - $debit,
            'type' => '3',
        ]);

        // save withdrawal 
        Withdrawal::create([
            'user_id' => $user->id,
            'payment_id' => $validate['payment_id'],
            'amount' => $validate['amount'],
            'charges' => $charges,
        ]);

        return redirect()->route('user.withdraw')->with(['success' => 'Withdrawal request successfully initiated, it will be processed shortly.']);

    }
}
