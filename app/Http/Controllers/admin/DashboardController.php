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
use Carbon\Carbon;
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

        $hours_in =  Deposit::where([['status', '=', '1']])->whereDate('created_at', Carbon::now()->subHour())->sum('amount');
        $hours_out =  Withdrawal::where([['status', '=', '1']])->whereDate('created_at', Carbon::now()->subHour())->sum('amount');

        $week_in = Deposit::where([['status', '=', '1']])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        $week_out = Withdrawal::where([['status', '=', '1']])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');

        $year_in = Deposit::where([['status', '=', '1']])->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount');
        $year_out = Withdrawal::where([['status', '=', '1']])->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount');

        $month_in = Deposit::where([['status', '=', '1']])->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount');
        $month_out = Withdrawal::where([['status', '=', '1']])->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount');
        $all_time_in = Deposit::where([['status', '=', '1']])->sum('amount');
        $all_time_out = Withdrawal::where([['status', '=', '1']])->sum('amount');
        // Dashboard 2


        return view('admin.dashboard-2', compact('title', 'page_title', 'users', 'deposits', 'withdrawals', 'investments',
        'transactions', 'total_deposit', 'total_investment', 'active_users', 'inactive_users', 'investment_packages', 'pending_withdrawals', 'pending_deposits',
        'payment_methods', 'hours_in', 'hours_out', 'week_in', 'week_out', 'year_in', 'year_out', 'month_in', 'month_out', 'all_time_in', 'all_time_out'));
    }
}
