<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\Wallet;


class WithdrawalController extends UserController
{
    public function index()
    {
        // rettrieve the withdrawal settings 
        $minimum_withdrawal = $this->_get_setting('minimum-withdrawal');
        $maximum_withdrawal =  $this->_get_setting('maximum-withdrawal');
        $processing_time =  $this->_get_setting('withdrawal-time');
        $withdrawal_charge =  $this->_get_setting('withdrawal-charges');
        $wth_charge = json_decode($withdrawal_charge);

        $minimum_withdrawal = number_format($minimum_withdrawal, 2);
        $maximum_withdrawal = number_format($maximum_withdrawal, 2);
        $payments = Payment::where('status', '1')->get();
        $title = 'Withdrawal';
        $page_title = 'Withdrawal Request';

        $currency = $this->currency;

        $currency_short = $this->currency_short;

        $charge = ($wth_charge->type == 0) ? number_format($wth_charge->amount, 2) . '%' :
            $currency_short . ' ' . number_format($wth_charge->amount, 2);

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
        $amount = $validate['amount'];
        $wallet = Wallet::where('user_id', $user->id)->latest()->first();

        $withdrawal_charge =  $this->_get_setting('withdrawal-charges');
        $wth_charge = json_decode($withdrawal_charge);

        $charges = ($wth_charge->type == 0) ? ($wth_charge->amount / 100) * $amount : $wth_charge->amount;

        $balance = ($wallet) ? $wallet->balance : 0;

        $debit = $amount + $charges;

        if($balance < $debit)
        {
            return back()->withErrors(['amount' => 'Amount specified is less than your available balance!']);
        }

        $desc = 'Debit for withdrawal of ' . $this->currency_short . number_format($amount, 2) . ', with charges of ' . $this->currency_short . number_format($charges, 2);

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
            'amount' => $amount,
            'charges' => $charges,
        ]);

        return redirect()->route('user.withdraw')->with(['success' => 'Withdrawal request successfully initiated, it will be processed shortly.']);

    }
}
