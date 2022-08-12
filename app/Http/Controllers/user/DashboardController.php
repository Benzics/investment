<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\core\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends UserController
{

    public function index()
    {
        $user = auth()->user();
        $ref_id = User::findOrFail($user->id)->profile->ref_id;
        $title = 'My Dashboard';
        $page_title = 'My Dashboard';
        $currency = $this->_currency_short;
        
        return view('user.dashboard', compact('user', 'ref_id', 'title', 'page_title', 'currency'));
    }
}
