<?php
namespace App\Services;

use App\Models\Deposit;
use App\Models\Wallet;
use App\Models\Withdrawal;

class UserService {

    /**
     * Get the user balance
     * @param $user_id
     * @return
     */
    public function get_balance(int $user_id)
    {
        $wallet = Wallet::where('user_id', $user_id)->latest()->first();

        $balance = ($wallet) ? $wallet->balance : 0;

        return $balance;
    }

    /**
     * Get the total deposits of a user
     * @param $user_id
     * @return
     */
    public function get_total_deposits(int $user_id)
    {
        $deposits = Deposit::where(['user_id' => $user_id, 'status' => '1'])->sum('amount');

        return $deposits;
    }

    /**
     * Get user total withdrawals
     * @param $user_id
     */
    public function get_total_withdrawals(int $user_id)
    {
        $withdrawals = Withdrawal::where('user_id', $user_id)->sum('amount');
        
        return $withdrawals;
    }
}