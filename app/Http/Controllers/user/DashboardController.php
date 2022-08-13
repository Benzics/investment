<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\core\UserController;


class DashboardController extends UserController
{

    public function index()
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
        $total_investments = $currency_symbol . num_format($this->_user_service->get_total_investments($user->id));
        $total_referrals = $this->_user_service->get_referrals($user->id);
        $investments = $this->_user_service->get_latest_investments($user->id);

        $view_data = ['user', 'ref_id', 'title', 'page_title', 'currency', 'balance', 'total_deposit', 'total_withdrawals', 
            'total_investments', 'total_referrals', 'investments'];

        return view('user.dashboard', compact($view_data));
    }
}
