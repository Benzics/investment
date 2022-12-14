<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use Illuminate\Contracts\View\View;

class DashboardController extends UserController
{

    public function index() : View
    {
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
        $title = 'My Dashboard';
        $page_title = 'My Dashboard';
        $currency = $this->_currency_short;
        $currency_symbol = $this->_currency;
        $balance = num_format($this->_user_service->get_balance($user->id)) . ' ' . $currency;
        $total_deposit = $currency_symbol . num_format($this->_user_service->get_total_deposits($user->id));
        $total_withdrawals = $currency_symbol . num_format($this->_user_service->get_total_withdrawals($user->id));
        $lastWithdrawal = $currency_symbol . num_format($this->_user_service->getLastWithdrawal($user->id));
        $total_investments = $currency_symbol . num_format($this->_user_service->get_total_investments($user->id));
        $total_referrals = $this->_user_service->get_referrals($user->id);
        $investments = $this->_user_service->get_latest_investments($user->id);
        $profit = num_format($this->_user_service->get_total_investment_profit($user->id));

        $view_data = ['user', 'ref_id', 'title', 'page_title', 'currency', 'balance', 'total_deposit', 'total_withdrawals', 
            'total_investments', 'total_referrals', 'investments', 'profit', 'lastWithdrawal'];

        return view('user.dashboard', compact($view_data));
    }
}
