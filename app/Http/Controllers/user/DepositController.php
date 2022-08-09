<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Deposit;
use App\Models\Payment;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        return view('user.deposit', ['title' => 'Deposit', 'page_title' => 'Deposit Method']);
    }

    public function deposit(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required',
            'payment_id' => 'required',

        ]);

        $payment = Payment::find($validate['payment_id']);

        if(!$payment)
        {
            return redirect()->route('user.deposit')->with(['error' => 'Invalid payment method']);
        }

        return view('user.deposit-fund', ['title' => 'Deposit', 'page_title' => 'Deposit Preview', 'payment' => $payment]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'attachment' => ['required', File::image()],
            'amount' => 'required|min:1',
        ]);

        $attachment = $request->file('attachment')->store('deposits');

        Deposit::create([
            'user_id' => $this->user->id,
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
