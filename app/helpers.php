<?php

use Illuminate\Support\Facades\DB;

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