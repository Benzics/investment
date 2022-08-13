<?php

namespace App\Http\Controllers\core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Setting;
use App\Services\UserService;

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

    public $_user_service;

    public function __construct()
    {
        $this->_user_service = new UserService();

        $this->_currency = currency_symbol();
        $this->_currency_short = currency_short(); 
    
    }

   
}
