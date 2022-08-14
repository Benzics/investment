<?php

use Illuminate\Support\Facades\DB;
use App\Models\Currency;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Map investment status
 * @param int $status
 * @return string
 */
function map_investment_status(int $status)
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
 * Map withdrawal status
 * @param int $status
 * @return string
 */
function map_withdrawal_status(int $status)
{
    switch($status)
    {
        case 1:
            return 'Processed';
            break;
        case 2: 
            return 'Rejected';
            break;
        default:
            return 'Pending';
    }
}

/**
 * Appropriate CSS class names for status
 * @param int $status
 * @return string
 */
function map_status_class(int $status)
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
 * Appropriate CSS class names for withdrawal status
 * @param int $status
 * @return string
 */
function map_withdrawal_status_class(int $status)
{
    switch($status)
    {
        case 1:
            return 'green';
            break;
        case 2:
            return 'red';
            break;
        default:
            return 'orange';
    }
}

/**
 * Map the transaction type
 * @param $type
 * @return
 */
function map_transaction_type(int $type)
{
    switch($type)
    {
        case 1:
            return 'Top Up';
            break;
        case 2:
            return 'Referral Bonus';
            break;
        case 3:
            return 'Withdrawal';
            break;
        case 4:
            return 'Investment';
            break;
        case 5:
            return 'Profit';
            break;
        default:
            return 'Reference';
    }
}

/**
 * Retrieve a setting from the database
 * @param $setting_name
 * @return
 */
function setting(string $setting_name)
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

/**
 * Formats number into two decimal places
 * @param $number
 */
function num_format(float $number)
{
    return number_format($number, 2);
}

/**
 * Formats date to a more user friendly date
 * @param $time
 */
function friendly_date(string $time)
{
    $date = new DateTime($time);

    return $date->format('jS M Y');
}

/**
 * Formats time to a more user friendly time
 * @param $time
 */
function friendly_time(string $time)
{
    $date = new DateTime($time);

    return $date->format('jS M Y - h:i:A');
}