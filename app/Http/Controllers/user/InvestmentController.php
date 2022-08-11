<?php

namespace App\Http\Controllers\user;

use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Currency;

class InvestmentController extends UserController
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
        $full_name = $this->_full_name;
        $investment_plans = $this->investment_plans;

        /** 
         * we'll pull all the investment plans and save it in this array 
         */ 
        $investments = [];

        foreach($investment_plans as $row)
        {
            // if commission type is 1 it means its a flat fee, otherwise it is a percentage
            $commission = ($row->commission_type == 1) ? $this->_currency_short . ' ' . $row->commission :
                $row->commission . '%';
            
            $investments[] = (object) [
                'id' => $row->id,
                'name' => $row->name,
                'commission' => $commission,
                'times' => $row->times,
                'type' => $row->type,
                'minimum' => $row->minimum,
                'maximum' => $row->maximum,
            ];
        }

        return view('user.new-investment', compact('title', 'page_title', 'investments', 'full_name'));
    }

    public function preview(Request $request)
    {
        $title = 'Preview Investment';
        $page_title = 'Preview Investment';
        $full_name = $this->_full_name;

        $validate = $request->validate(['investment_id' => 'required|numeric']);
        
        $investment = Investment::findOrFail($validate['investment_id']);

        return view('user.preview-investment', compact('title', 'page_title', 'investment', 'full_name'));
    }
}
