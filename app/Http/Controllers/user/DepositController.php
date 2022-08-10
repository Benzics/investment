<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Deposit;
use App\Models\Payment;

class DepositController extends Controller
{

    public function index()
    {
        $payments = Payment::all();

        $payment_ids = [];

        foreach($payments as $row)
        {
            $payment_ids[] = '#payment-method'. $row->id;
        }

        $payment_string = implode(',', $payment_ids);

        return view('user.deposit', ['title' => 'Deposit', 'page_title' => 'Deposit Method',
            'payments' => $payments, 'payment_string' => $payment_string]);
    }

    public function deposit(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required',
            'payment_id' => 'required',

        ]);


        $payment = Payment::find($validate['payment_id']);

        $charges = 1;

        if(!$payment)
        {
            return redirect()->route('user.deposit')->with(['error' => 'Invalid payment method']);
        }

        return view('user.deposit-fund', ['title' => 'Deposit', 'page_title' => 'Deposit Preview', 
            'payment' => $payment, 'amount' => $request->amount, 'charges' => $charges]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'attachment' => ['required', File::image()],
            'amount' => 'required|min:1',
            'payment_id' => 'required',
        ]);

        $attachment = $request->file('attachment')->store('deposits');
        $user = auth()->user();

        Deposit::create([
            'user_id' => $user->id,
            'payment_id' => $request->payment_id,
            'attachment' => $attachment,
            'amount' => $request->amount,
            'charges' => $request->charges,
            'description' => $request->description,
            'total' => $request->amount + $request->charges,
            'status' => '0',
        ]);

        return redirect()->route('user.deposit')
            ->with(['success' => 'Your proof has been uploaded. Please wait, it will be reviewed shortly.']);
    }
}
