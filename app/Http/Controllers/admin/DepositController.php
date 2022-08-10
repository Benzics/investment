<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;

class DepositController extends Controller
{
    public function index()
    {
        return view('admin.fund-wallet');
    }

    public function store(Request $request, Wallet $wallet)
    {
        Gate::authorize('fund', $wallet);

        $validate = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|min:1|numeric',
        ]);

        $user = User::where('email', $validate['email'])->first();

        if(!$user)
        {
            return back()
                ->withInput()
                ->withErrors(['email' => 'The supplied email address does not exist!']);
        }

        // get previous balance 
        $balance = Wallet::where('user_id', $user->id)->latest()->first();

        $add_balance = ($balance) ? $balance->balance : 0;
        $credit = $validate['amount'];

        Wallet::create([
            'user_id' => $user->id,
            'credit' => $credit,
            'type' => '1',
            'description' => 'Wallet top up.',
            'balance' => $add_balance + $credit
        ]);

        return redirect('/admin/fund-wallet')->with(['success' => 'User wallet funded successfully']);
    }

    public function deposits()
    {
        return view('admin.deposits');
    }
}
