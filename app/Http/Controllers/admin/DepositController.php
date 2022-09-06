<?php

/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */

namespace App\Http\Controllers\admin;

use App\Events\DepositApproved;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;

use App\Services\DepositService;
use App\Services\UserService;
use Throwable;

class DepositController extends Controller
{
    public $service;

    public function __construct(DepositService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $title = 'Fund Wallet';
        $page_title = 'Fund Wallet';

        return view('admin.fund-wallet', compact('title', 'page_title'));
    }

    public function store(Request $request, Wallet $wallet)
    {
        // Gate::authorize('fund', $wallet);

        $validate = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|min:1|numeric',
        ]);

        $user = User::where('email', $validate['email'])->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'The supplied email address does not exist!']);
        }

        // get previous balance 
        $balance = Wallet::where('user_id', $user->id)->latest('id')->first();

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

    public function debit()
    {
        $title = 'Debit Wallet';
        $page_title = 'Debit Wallet';

        return view('admin.fund-wallet', compact('title', 'page_title'));
    }

    public function debit_user(Request $request, Wallet $wallet)
    {
        // Gate::authorize('fund', $wallet);

        $validate = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|min:1|numeric',
        ]);

        $user = User::where('email', $validate['email'])->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'The supplied email address does not exist!']);
        }

        // get previous balance 
        $balance = Wallet::where('user_id', $user->id)->latest('id')->first();

        $add_balance = ($balance) ? $balance->balance : 0;
        $debit = $validate['amount'];

        Wallet::create([
            'user_id' => $user->id,
            'debit' => $debit,
            'type' => '6',
            'description' => 'Wallet debit.',
            'balance' => $add_balance - $debit
        ]);

        return redirect('/admin/debit-wallet')->with(['success' => 'User wallet debited successfully']);
    }

    public function deposits()
    {
        $title = 'Deposits';
        $page_title = 'deposits';
        $deposits = $this->service->get_all_deposits();


        return view('admin.deposits', compact('deposits', 'title', 'page_title'));
    }

    public function approve(int $id)
    {
        $deposit = $this->service->get_deposit($id);
        if (!$deposit) {
            return redirect()->route('admin.deposits')->with(['error' => 'Invalid deposit id']);
        }

        $this->service->approve_deposit($id);
        $user_service = new UserService();

        $desc = currency_symbol() . $deposit->amount . ' deposit.';

        $user_service->credit_user($deposit->user_id, $deposit->amount, 1, $desc);
        $user = $user_service->get_user($deposit->user_id);

        try {
            event(new DepositApproved($deposit));
        } catch (Throwable $e) {
            report($e);
        }

        return redirect()->route('admin.deposits')->with('success', 'Deposit successfully approved.');
    }

    public function decline(int $id)
    {

        $deposit = $this->service->get_deposit($id);
        if (!$deposit) {
            return redirect()->route('admin.deposits')->with(['error' => 'Invalid deposit id']);
        }

        $this->service->decline_deposit($id);

        return redirect()->route('admin.deposits')->with('success', 'Deposit successfully declined.');
    }

    public function delete(Request $request)
    {
        $validate = $request->validate(['id' => 'required|numeric']);

        $id = $validate['id'];

        $deposit = $this->service->get_deposit($id);

        if (!$deposit) {
            return redirect()->route('admin.deposits')->with(['error' => 'Invalid deposit id']);
        }

        $this->service->remove_deposit($id);

        return redirect()->route('admin.deposits')->with('success', 'Deposit successfully deleted.');
    }
}
