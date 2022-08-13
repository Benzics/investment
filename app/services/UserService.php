<?php
namespace App\Services;

use App\Models\Wallet;

class UserService {

    /**
     * Get the user balance
     * @param $user_id
     * @return
     */
    public function get_balance($user_id)
    {
        $wallet = Wallet::where('user_id', $user_id)->latest()->first();

        $balance = ($wallet) ? $wallet->balance : 0;

        return $balance;
    }
}