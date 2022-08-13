<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\core\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class DashboardController extends UserController
{

    public function index(UserService $user_service)
    {
        $user = auth()->user();
        $ref_id = User::findOrFail($user->id)->profile->ref_id;
        $title = 'My Dashboard';
        $page_title = 'My Dashboard';
        $currency = $this->_currency_short;
        $currency_symbol = $this->_currency;
        $balance = num_format($user_service->get_balance($user->id)) . ' ' . $currency;
        $total_deposit = $currency_symbol . num_format($user_service->get_total_deposits($user->id));

        
        return view('user.dashboard', compact('user', 'ref_id', 'title', 'page_title', 'currency', 'balance', 'total_deposit',
        ));
    }
}
