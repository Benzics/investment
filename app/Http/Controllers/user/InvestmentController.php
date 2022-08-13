<?php

namespace App\Http\Controllers\user;

use App\Models\Investment;
use Illuminate\Http\Request;
use App\Http\Controllers\core\UserController;
use App\Models\UserInvestment;
use App\Models\Wallet;

use App\Events\Invested;
use App\Services\UserInvestmentService;
use App\Services\UserService;
use Throwable;

class InvestmentController extends UserController
{
    public $_investment_plans;
    public $_investment_service;

    public function __construct()
    {
        parent::__construct();

        $this->_investment_service = new UserInvestmentService();

        $investments = $this->_investment_service->get_active_plans();
        $this->_investment_plans = $investments;


    }

    public function index()
    {
        $title = 'New Investment';
        $page_title = 'New Investment';
        $user = auth()->user();
   

       $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
      
        $_investment_plans = $this->_investment_plans;

        /** 
         * we'll pull all the investment plans and save it in this array 
         */ 
        $investments = $this->_investment_service->get_user_readable_plans();

        $currency = $this->_currency_short;

        return view('user.new-investment', compact('title', 'page_title', 'investments', 'user', 'ref_id', 'currency'));
    }

    public function preview(Request $request)
    {
        $title = 'Preview Investment';
        $page_title = 'Preview Investment';
        $user = auth()->user();
       
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;

        $validate = $request->validate(['investment_id' => 'required|numeric']);
        
        $investment = Investment::findOrFail($validate['investment_id']);
        $currency = $this->_currency_short;
        $currency_sign = $this->_currency;

        $wallet = Wallet::where('user_id', $user->id)->latest()->first();
        $balance = ($wallet) ? $wallet->balance : 0;

        $low_balance = ($balance < $investment->minimum) ?: false;

        $commission = ($investment->commission_type == 1) ? $currency . ' ' . num_format($investment->commission) : $investment->commission . '%';
        $name = $investment->name;
        $minimum = number_format($investment->minimum, 2) . ' ' . $currency;
        $maximum = number_format($investment->maximum, 2) . ' ' . $currency;
        $times = $investment->times;
        $type = $investment->type;
        
        $view_data = ['title', 'page_title', 'investment', 'user', 'ref_id', 'currency', 'name', 'minimum', 'maximum', 'commission', 'type', 'times', 'balance', 'low_balance', 'currency_sign'];

        return view('user.preview-investment', compact($view_data));
    }

    public function invest(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required',
            'investment_id' => 'required|numeric',
        ]);

        $user = auth()->user();
        $amount = $validate['amount'];
        $investment_id = $validate['investment_id'];

        $investment = Investment::findOrFail($investment_id);

      
        $balance = $this->_user_service->get_balance($user->id);

        if($balance < $amount || $amount < $investment->minimum)
        {
            return back()->withErrors(['amount' => 'Amount specified is less than your available balance! You need to make a deposit.']);
        }

        $desc = 'Debit for investment plan ' . $investment->name;
        // debit user 

        $this->_user_service->debit_user($user->id, $amount, 4, $desc);

        $user_investment = $this->_investment_service->create([
            'user_id' => $user->id,
            'investment_id' => $investment_id,
            'amount' => $amount,
        ]);

        // mail the admin
        try 
        {
            if(setting('investment-notification'))
            {
                Invested::dispatch($user_investment, $user->email);
            }
           
        } 
        catch (Throwable $e) 
        {
            report($e);
        }
        return redirect()->route('user.investments')
            ->with('success', 'Your investment has successfully been created. Happy Earnings!');
        
    }

    public function investments(UserService $user_service)
    {
        $title = 'My Investments';
        $page_title = 'My Investments';
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;

        $investments = $user_service->get_user_investments($user->id);

        $currency = $this->_currency_short;

        $view_data = ['title', 'page_title', 'user', 'ref_id', 'investments', 'currency'];

        return view('user.investments', compact($view_data));
    }
}
