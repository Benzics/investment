<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

class DashboardController extends UserController
{

    public function index()
    {
        $data = [
            'title' => 'My Dashboard',
            'page_title' => 'My Dashboard',
            'full_name' => $this->_full_name,
        ];
        
        return view('user.dashboard', $data);
    }
}
