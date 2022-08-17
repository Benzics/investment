<?php
namespace App\Services;

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
}


