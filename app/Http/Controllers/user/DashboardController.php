<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $full_name;

    public function __construct()
    {
        $user = auth()->user();
        $this->full_name = $user->full_name;
    }
    public function index()
    {
        $data = [
            'title' => 'My Dashboard',
            'page_title' => 'My Dashboard',
        ];
        
        return view('user.dashboard', $data);
    }
}
