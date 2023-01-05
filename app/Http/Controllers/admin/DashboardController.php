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
use App\Services\DepositService;
use App\Services\UserService;
use App\Services\WithdrawalService;
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

        $depositService = new DepositService();
        $withdrawService = new WithdrawalService();

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

        $deposit_january = $depositService->dataMonth(1);
        $deposit_february = $depositService->dataMonth(2);
        $deposit_march =  $depositService->dataMonth(3);
        $deposit_april =  $depositService->dataMonth(4);
        $deposit_may =  $depositService->dataMonth(5);
        $deposit_june = $depositService->dataMonth(6);
        $deposit_july = $depositService->dataMonth(7);
        $deposit_august =  $depositService->dataMonth(8);
        $deposit_september =  $depositService->dataMonth(9);
        $deposit_october =  $depositService->dataMonth(10);
        $deposit_november =  $depositService->dataMonth(11);
        $deposit_december =  $depositService->dataMonth(12);

        $withdraw_january = $withdrawService->dataMonth(1);
        $withdraw_february = $withdrawService->dataMonth(2);
        $withdraw_march =  $withdrawService->dataMonth(3);
        $withdraw_april =  $withdrawService->dataMonth(4);
        $withdraw_may =  $withdrawService->dataMonth(5);
        $withdraw_june = $withdrawService->dataMonth(6);
        $withdraw_july = $withdrawService->dataMonth(7);
        $withdraw_august =  $withdrawService->dataMonth(8);
        $withdraw_september =  $withdrawService->dataMonth(9);
        $withdraw_october =  $withdrawService->dataMonth(10);
        $withdraw_november =  $withdrawService->dataMonth(11);
        $withdraw_december =  $withdrawService->dataMonth(12);

        $var_data = [
            ['month' => 'January', 'count' => $deposit_january],
            ['month' => 'February', 'count' => $deposit_february],
            ['month' => 'March', 'count' => $deposit_march],
            ['month' => 'April', 'count' => $deposit_april],
            ['month' => 'May', 'count' => $deposit_may],
            ['month' => 'June', 'count' => $deposit_june],
            ['month' => 'July', 'count' => $deposit_july],
            ['month' => 'August', 'count' => $deposit_august],
            ['month' => 'September', 'count' => $deposit_september],
            ['month' => 'October', 'count' => $deposit_october],
            ['month' => 'November', 'count' => $deposit_november],
            ['month' => 'December', 'count' => $deposit_december],
        ];

        $withdrawal_data = [
            ['month' => 'January', 'count' => $withdraw_january],
            ['month' => 'February', 'count' => $withdraw_february],
            ['month' => 'March', 'count' => $withdraw_march],
            ['month' => 'April', 'count' => $withdraw_april],
            ['month' => 'May', 'count' => $withdraw_may],
            ['month' => 'June', 'count' => $withdraw_june],
            ['month' => 'July', 'count' => $withdraw_july],
            ['month' => 'August', 'count' => $withdraw_august],
            ['month' => 'September', 'count' => $withdraw_september],
            ['month' => 'October', 'count' => $withdraw_october],
            ['month' => 'November', 'count' => $withdraw_november],
            ['month' => 'December', 'count' => $withdraw_december],
        ];
       
        $var_data = json_encode($var_data);
        $withdrawal_data = json_encode($withdrawal_data);

        return view('admin.dashboard-2', compact('title', 'page_title', 'users', 'deposits', 'withdrawals', 'investments',
        'transactions', 'total_deposit', 'total_investment', 'active_users', 'inactive_users', 'investment_packages', 'pending_withdrawals', 'pending_deposits',
        'payment_methods', 'hours_in', 'hours_out', 'week_in', 'week_out', 'year_in', 'year_out', 'month_in', 'month_out', 'all_time_in', 'all_time_out',
    'var_data', 'withdrawal_data'));
    }
}
