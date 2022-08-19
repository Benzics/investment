<?php
namespace App\Services;

use App\Models\Currency;
use App\Models\Setting;

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

	/**
	 * Update a settings field in the database
	 * @param string $value
	 * @param string $name
	 * @return
	 */
	public function update_setting(string $value, string $name)
	{
		$set = Setting::where('name', $name)->update(['value' => $value]);

		return $set;
	}
}


