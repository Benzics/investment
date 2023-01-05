<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = $page_title = 'Dashboard';
        $userService = new UserService();
        $users = $userService->get_users_count();
        $active_users = $userService->activeUsers();
        $inactive_users = $userService->inactiveUsers();
        $deposits = $userService->get_deposits_count();
        $withdrawals = $userService->get_withdrawals_count();
        $investments = $userService->get_investments_count();
        $transactions = $userService->get_transactions();
        $total_deposit = num_format($userService->total_deposits());
        $total_investment = num_format($userService->total_investments());
        $investment_packages = Investment::count();
        $pending_withdrawals = Withdrawal::where('status', 0)->count();
        $pending_deposits = Deposit::where('status', 0)->count();
        $payment_methods = Payment::all();

        // Dashboard 2


        return view('admin.dashboard-2', compact('title', 'page_title', 'users', 'deposits', 'withdrawals', 'investments',
        'transactions', 'total_deposit', 'total_investment', 'active_users', 'inactive_users', 'investment_packages', 'pending_withdrawals', 'pending_deposits',
        'payment_methods'));
    }
}
