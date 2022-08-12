<?php

use Illuminate\Support\Facades\DB;
use App\Models\Currency;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Map investment status
 * @param int $status
 * @return string
 */
function map_investment_status($status)
{
    switch($status)
    {
        case 1:
            return 'Active';
            break;
        case 2: 
            return 'Complete';
            break;
        default:
            return 'Inactive';
    }
}

/**
 * Appropriate CSS class names for status
 * @param int $status
 * @return string
 */
function map_status_class($status)
{
    switch($status)
    {
        case 1:
            return 'blue';
            break;
        case 2:
            return 'green';
            break;
        default:
            return 'red';
    }
}

/**
 * Retrieve a setting from the database
 * @param int $setting_name
 */
function setting($setting_name)
{
    $setting = DB::table('settings')->where('name', $setting_name)->first();

    return $setting ? $setting->value : false;
}

/**
 * Get the current currency symbol in use
 * @return
 */
function currency_symbol()
{
    $currency_id = setting('currency');
   
    try
    {
        $currency = Currency::findOrFail($currency_id);
        return $currency->symbol;
    }
    catch(ModelNotFoundException $e)
    {
        report($e);
        return '$';
    }
}

/**
 * Get the current currency short code in use
 * @return
 */
function currency_short()
{
    $currency_id = setting('currency');
   
    try
    {
        $currency = Currency::findOrFail($currency_id);
        return $currency->short_code;
    }
    catch(ModelNotFoundException $e)
    {
        report($e);
        return 'USD';
    }
}