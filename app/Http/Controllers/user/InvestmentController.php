<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Currency;

class InvestmentController extends Controller
{
    public $investment_plans;

    /**
     * Currency symbol enabled in settings
     */
    private $currency;

    /**
     * Currency short code in settings
     */
    private $currency_short;

    public function __construct()
    {
        $investments = Investment::where('status', '1')->get();
        $this->investment_plans = $investments;
        $site_currency = Setting::where('name', 'currency')->firstOrFail();
        $currency = Currency::findOrFail($site_currency->value);

        $this->currency = $currency->symbol;
        $this->currency_short = $currency->short_code;
    }

    public function index()
    {
        $title = 'New Investment';
        $page_title = 'New Investment';
        $investment_plans = $this->investment_plans;

        /** 
         * we'll pull all the investment plans and save it in this array 
         */ 
        $investments = [];

        foreach($investment_plans as $row)
        {
            // if commission type is 1 it means its a flat fee, otherwise it is a percentage
            $commission = ($row->commission_type == 1) ? $this->currency_short . ' ' . $row->commission :
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

        return view('user.new-investment', compact('title', 'page_title', 'investments'));
    }

    public function preview(Request $request)
    {
        $title = 'Preview Investment';
        $page_title = 'Preview Investment';

        $validate = $request->validate(['investment_id' => 'required|numeric']);
        
        $investment = Investment::findOrFail($validate['investment_id']);

        return view('user.preview-investment', compact('title', 'page_title', 'investment'));
    }
}
