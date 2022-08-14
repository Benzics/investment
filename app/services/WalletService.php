<?php
namespace App\Services;

use App\Models\Wallet;

class WalletService {

    /**
     * Get user's latest transactions
     * @param $user_id
     * @param? $paginate
     */
    public function get_user_transactions(int $user_id, int $paginate = 15)
    {
        $transactions = Wallet::where('user_id', $user_id)
        ->latest('id')
        ->paginate($paginate);

        return $transactions;
    }


}