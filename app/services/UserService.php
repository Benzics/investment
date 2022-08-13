<?php
namespace App\Services;

use App\Models\UserInvestment;
use App\Models\Deposit;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;

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
     * @return
     */
    public function get_total_withdrawals(int $user_id)
    {
        $withdrawals = Withdrawal::where('user_id', $user_id)->sum('amount');
        
        return $withdrawals;
    }

    /**
     * Get the total investments of a user
     * @param $user_id
     * @return
     */
    public function get_total_investments(int $user_id)
    {
        $investments = UserInvestment::where('user_id', $user_id)->sum('amount');

        return $investments;
    }

    /**
     * Get the number of referrals a user has
     * @param $user_id
     * @return
     */
    public function get_referrals($user_id)
    {
        $user_ref = Profile::where('referrer', $user_id)->count();

        return $user_ref;
    }

    /**
     * Get 5 investments from a user
     * @param $user_id
     * @return
     */
    public function get_latest_investments($user_id)
    {
        $investments = DB::table('user_investments')
            ->where('user_id', $user_id)
            ->join('investments', 'user_investments.investment_id', '=', 'investments.id')
            ->select('user_investments.*', 'investments.name')
            ->latest()
            ->limit(5)
            ->get();
        
        return $investments;
    }
}