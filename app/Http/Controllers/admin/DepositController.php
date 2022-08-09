<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        return view('admin.fund-wallet');
    }

    public function store(Request $request)
    {
        
    }
}
