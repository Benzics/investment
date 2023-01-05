<?php
namespace App\Services;

use App\Models\Deposit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

/**
*Automatically generated service
*Author: Benjamin Ojobo
*https://github.com/benzics
*/


class DepositService 
{
	/**
	 * Get all deposits
	 * @return
	 */
	public function get_all_deposits()
	{
		$deposits = DB::table('deposits')
		->join('payments', 'deposits.payment_id', '=', 'payments.id')
		->select('deposits.*', 'payments.name')
		->orderBy('status', 'DESC')
		->orderBy('id', 'DESC')
		->get();
	
		return $deposits;
	}

	/**
	 * Get a deposit
	 * @param int $deposit_id
	 * @return
	 */
	public function get_deposit(int $deposit_id)
	{
		try 
		{
			$deposit = Deposit::findOrFail($deposit_id);
			return $deposit;
		}
		catch (ModelNotFoundException $e)
		{
			report($e);
			return false;
		}
	}

	/**
	 * Approve a deposit
	 * @param int $deposit_id
	 * @return
	 */
	public function approve_deposit(int $deposit_id)
	{
		$deposit = Deposit::where('id', $deposit_id)->update(['status' => '1']);

		return $deposit;
	}

	/**
	 * Decline a deposit
	 * @param int $deposit_id
	 * @return
	 */
	public function decline_deposit(int $deposit_id)
	{
		$deposit = Deposit::where('id', $deposit_id)->update(['status' => '2']);

		return $deposit;
	}

	/**
	 * Delete a deposit
	 * @param int $deposit_id
	 * @return
	 */
	public function remove_deposit(int $deposit_id)
	{
		$deposit = Deposit::where('id', $deposit_id)->delete();

		return $deposit;
	}

	/**
	 * Get total deposits for the provided month
	 */
	public function dataMonth(int $month)
	{
		$total = Deposit::where([['status', '=', '1']])->whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->sum('amount');
		return $total;
	}
}


