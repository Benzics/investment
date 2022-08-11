<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public $investment_plans;

    public function __construct()
    {
        $investments = Investment::where('status', '1')->get();
        $this->investment_plans = $investments;
    }

    public function index()
    {
        $title = 'New Investment';
        $page_title = 'New Investment';
        $investment_plans = $this->investment_plans;

        return view('user.new-investment', compact('title', 'page_title', 'investment_plans'));
    }
}
