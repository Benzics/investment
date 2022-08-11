<?php

namespace App\Http\Controllers\core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Setting;

class UserController extends Controller
{
   
     /**
     * Currency symbol enabled in settings
     */
    public $_currency;

    /**
     * Currency short code in settings
     */
    public $_currency_short;

    /**
     * React with the user database
     */
    public $_user;

    public function __construct()
    {
        $site_currency = $this->_get_setting('currency');
        $currency = Currency::findOrFail($site_currency);

        $this->_currency = $currency->symbol;
        $this->_currency_short = $currency->short_code; 
    
    }

    /**
     * Retrieve a setting from the settings database
     * @param $setting the setting name you want to retrieve
     * @return
     */
    public function _get_setting(String $setting)
    {
        $get_setting = Setting::where('name', $setting)->firstOrFail();

        return $get_setting->value;
    }
}
