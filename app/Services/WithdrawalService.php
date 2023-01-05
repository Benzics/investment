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

	/**
	 * Returns a withdrawal data
	 * @param int $withdrawal_id
	 * @return
	 */
	public function get_withdrawal(int $withdrawal_id)
	{
		$withdrawal = Withdrawal::find($withdrawal_id);

		return $withdrawal;
	}

	/**
	 * Approves a user withdrawal
	 * @param int $withdrawal_id
	 * @return
	 */
	public function approve(int $withdrawal_id)
	{
		$withdrawal = Withdrawal::where('id', $withdrawal_id)->update(['status' => '1']);

		return $withdrawal;
	}

	/**
	 * Declines a user withdrawal
	 * @param int $withdrawal_id
	 * @return
	 */
	public function decline(int $withdrawal_id)
	{
		$withdrawal = Withdrawal::where('id', $withdrawal_id)->update(['status' => '2']);

		return $withdrawal;
	}

	/**
	 * Get all user withdrawals in site
	 * @return
	 */
	public function get_withdrawals()
	{
		$withdrawals = DB::table('withdrawals')
        ->join('payments', 'withdrawals.payment_id', '=', 'payments.id')
        ->select('withdrawals.*', 'payments.name')
        ->latest()
        ->get();

		return $withdrawals;
	}

	/**
	 * Get total withdrawals for the provided month
	 */
	public function dataMonth(int $month)
	{
		$total = Withdrawal::where([['status', '=', '1']])->whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount');
		return $total;
	}
}


