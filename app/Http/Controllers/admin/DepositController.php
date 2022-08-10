<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function index()
    {
        $title = 'Fund Wallet';
        $page_title = 'fund_wallet';

        return view('admin.fund-wallet', compact('title', 'page_title'));
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
        $title = 'Deposits';
        $page_title = 'deposits';
        $deposits = Deposit::orderBy('status')->get();

        
        return view('admin.deposits', compact('deposits', 'title', 'page_title'));
    }
}
