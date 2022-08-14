<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use App\Services\WalletService;

class TransactionController extends UserController
{
    public function index()
    {
        $title = 'My Transactions';
        $page_title = $title;
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
        $wallet_service = new WalletService();

        $transactions = $wallet_service->get_user_transactions($user->id);
        $currency = $this->_currency;
        
        $view_data = ['title', 'page_title', 'user', 'ref_id', 'transactions', 'currency'];

        return view('user.transactions', compact($view_data));
    }

    public function profits()
    {
        $title = 'My Profits';
        $page_title = $title;
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
        $wallet_service = new WalletService();

        $profits = $wallet_service->get_user_profits($user->id);
        $currency = $this->_currency;
        
        $view_data = ['title', 'page_title', 'user', 'ref_id', 'profits', 'currency'];

        return view('user.profits', compact($view_data));
    }
}
