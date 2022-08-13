<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;

class TransactionController extends UserController
{
    public function index()
    {
        $title = 'My Transactions';
        $page_title = 'My Transactions';
        $user = auth()->user();
       $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
        $transactions = Wallet::where('user_id', $user->id)->latest()->paginate(15);
        $currency = $this->_currency;

        return view('user.transactions', compact('title', 'page_title', 'user', 'ref_id', 'transactions', 'currency'));
    }
}
