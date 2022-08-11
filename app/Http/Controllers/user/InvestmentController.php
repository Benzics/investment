<?php

namespace App\Http\Controllers\user;

use App\Models\Investment;
use Illuminate\Http\Request;
use App\Http\Controllers\core\UserController;
use App\Models\User;
use App\Models\UserInvestment;
use App\Models\Wallet;

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
        $user = auth()->user();
   

        $ref_id = User::findOrFail($user->id)->profile->ref_id;
      
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

        return view('user.new-investment', compact('title', 'page_title', 'investments', 'user', 'ref_id'));
    }

    public function preview(Request $request)
    {
        $title = 'Preview Investment';
        $page_title = 'Preview Investment';
        $user = auth()->user();
       
        $ref_id = User::findOrFail($user->id)->profile->ref_id;

        $validate = $request->validate(['investment_id' => 'required|numeric']);
        
        $investment = Investment::findOrFail($validate['investment_id']);

        return view('user.preview-investment', compact('title', 'page_title', 'investment', 'user', 'ref_id'));
    }

    public function invest(Request $request)
    {
        $validate = $request->validate(['amount' => 'required', 'investment_id' => 'required|numeric']);

        $user = auth()->user();
        $amount = $validate['amount'];
        $investment_id = $validate['investment_id'];

        $investment = Investment::findOrFail($investment_id);

        $wallet = Wallet::where('user_id', $user->id)->latest()->first();
        $balance = ($wallet) ? $wallet->balance : 0;

        if($balance < $amount)
        {
            return back()->withErrors(['amount' => 'Amount specified is less than your available balance! You need to make a deposit.']);
        }

        $desc = 'Debit for investment plan ' . $investment->name;
        // debit user 
        Wallet::create([
        'user_id' => $user->id,
        'debit' => $amount,
        'description' => $desc,
        'balance' => $balance - $amount,
        'type' => '4',
        ]);

        UserInvestment::create([
            'user_id' => $user->id,
            'investment_id' => $investment_id,
            'amount' => $amount,
        ]);

        return redirect()->route('user.investments')
            ->with('success', 'Your investment has successfully been created. Happy Earnings!');
        
    }

    public function investments()
    {
        $title = 'My Investments';
        $page_title = 'My Investments';
        $user = auth()->user();
        $ref_id = User::findOrFail($user->id)->profile->ref_id;
        $investments = UserInvestment::where('user_id', $user->id)
            ->join('investments', 'user_investments.id', '=', 'investments.id')
            ->get();

        return view('user.investments', compact('title', 'page_title', 'user', 'ref_id', 'investments'));
    }
}
