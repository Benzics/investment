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
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = $page_title = 'Dashboard';
        $user_service = new UserService();
        $users = $user_service->get_users_count();
        $deposits = $user_service->get_deposits_count();
        $withdrawals = $user_service->get_withdrawals_count();
        $investments = $user_service->get_investments_count();
        $transactions = $user_service->get_transactions();
        $total_deposit = num_format($user_service->total_deposits());
        $total_investment = num_format($user_service->total_investments());

        return view('admin.dashboard', compact('title', 'page_title', 'users', 'deposits', 'withdrawals', 'investments',
         'transactions', 'total_deposit', 'total_investment'));
    }
}
