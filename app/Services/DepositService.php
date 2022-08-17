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
	 * @param? int $paginate
	 */
	public function get_all_deposits(int $paginate = 15)
	{
		$deposits = DB::table('deposits')
		->join('payments', 'deposits.payment_id', '=', 'payments.id')
		->select('deposits.*', 'payments.name')
		->orderBy('status', 'DESC')
		->orderBy('id', 'DESC')
		->paginate($paginate);
	
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
}


