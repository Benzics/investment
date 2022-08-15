<?php
namespace App\Services;

use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;

#Automatically generated service
#Author: Benjamin Ojobo


class WithdrawalService {
	
	/**
	 * Initiate a withdrawal
	 * @param $data
	 */
	public function make_withdrawal(array $data)
	{
		$withdrawal = Withdrawal::create($data);

		return $withdrawal;
	}

	/**
	 * Get user latest withdrawals
	 * @param $user_id
	 * @param? $paginate
	 */
	public function get_user_withdrawals(int $user_id, int $paginate = 15)
	{
		$withdrawals = DB::table('withdrawals')
        ->where('user_id', $user_id)
        ->join('payments', 'withdrawals.payment_id', '=', 'payments.id')
        ->select('withdrawals.*', 'payments.name')
        ->latest()
        ->paginate($paginate);

		return $withdrawals;
	}
}


