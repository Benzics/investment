<?php

use Illuminate\Support\Facades\DB;
use App\Models\Currency;
use App\Models\User;
use App\Models\Wallet;
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
            return 'Approved';
            break;
        case 2: 
            return 'Rejected';
            break;
        default:
            return 'Pending';
    }
}

/**
 * Map the user status
 * @param int $status
 * @return string
 */
function map_user_status(int $status) : string
{
    switch($status)
    {
        case 1:
            return 'Active';
            break;
        case 2:
            return 'Banned';
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
    try
    {
    $setting = DB::table('settings')->where('name', $setting_name)->first();
    return $setting->value;
    }
    catch (Throwable $e)
    {
        report($e);
        return '';
    }
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

/**
 * Returns a user friendly string for the number of days set on investment
 * @param int $days
 * @return string
 */
function investment_days(int $days) : string
{
    switch($days)
    {
        case 1:
            return 'Daily';
            break;
        case 7:
            return 'Weekly';
            break;
        case 30:
            return 'Monthly';
            break;
        case 365:
            return 'Yearly';
            break;
        default:
            return "$days Days";
    }
}

/**
 * Returns the user email
 * @param int $user_id
 * @return string
 */
function get_email(int $user_id) : string
{
    $user = User::select('email')->first();

    return $user?->email;
}

/**
 * Marks an investment commission type to its string equivalent
 * @param int $commission_type
 * @return string
 */
function map_investment_type(int $commission_type)
{
    switch($commission_type)
    {
        case 0:
            return "Percentage";
            break;
        case 1:
            return "Fixed amount";
    }
}
 /**
 * Get the user balance
 * @param $user_id
 * @return
 */
function get_balance(int $user_id)
{
    $wallet = Wallet::where('user_id', $user_id)->latest('id')->first();

    $balance = ($wallet) ? $wallet->balance : 0;

    return $balance;
}