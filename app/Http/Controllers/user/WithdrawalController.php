<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\Wallet;

class WithdrawalController extends Controller
{
    public function index()
    {
        $payments = Payment::where('status', '1')->get();
        $title = 'Withdrawal';
        $page_title = 'Withdrawal Request';

        $payment_ids = [];

        foreach($payments as $row)
        {
            $payment_ids[] = '#payment-method'. $row->id;
        }

        $payment_string = implode(',', $payment_ids);

        return view('user.withdraw', compact('payments', 'title', 'page_title', 'payment_string'));
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

        $desc = 'Debit for withdrawal of $' . number_format($validate['amount'], 2) . ', with charges of $' . number_format($charges, 2);

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
