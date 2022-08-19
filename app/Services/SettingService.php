<?php
namespace App\Services;

use App\Models\Currency;

/**
*Automatically generated service
*Author: Benjamin Ojobo
*https://github.com/benzics
*/


class SettingService {

	/**
	 * get all currencies available
	 * @return
	 */
	public function get_currencies()
	{
		$currency = Currency::all();

		return $currency;
	}
}


