<?php

namespace App\Http\Controllers\user;

use App\Events\NewWithdrawal;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\Wallet;
use App\Http\Controllers\core\UserController;
use App\Services\PaymentService;
use App\Services\WithdrawalService;
use Illuminate\Support\Facades\DB;
use Throwable;

class WithdrawalController extends UserController
{
    public $_withdrawal_service;

    public function __construct()
    {
        parent::__construct();
        $this->_withdrawal_service = new WithdrawalService();
    }
    public function index()
    {
        // retrieve the withdrawal settings 
        $minimum_withdrawal = $this->_user_service->get_setting('minimum-withdrawal');
        $maximum_withdrawal =  $this->_user_service->get_setting('maximum-withdrawal');
        $processing_time =  $this->_user_service->get_setting('withdrawal-time');
        $withdrawal_charge =  $this->_user_service->get_setting('withdrawal-charges');
        $wth_charge = json_decode($withdrawal_charge);

        $minimum_withdrawal = number_format($minimum_withdrawal, 2);
        $maximum_withdrawal = number_format($maximum_withdrawal, 2);

        $payment_service = new PaymentService();

        $payments = $payment_service->get_active_payments();
        $title = 'Withdrawal';
        $page_title = 'Withdrawal Request';

        $currency = $this->_currency;

        $currency_short = $this->_currency_short;

        $charge = ($wth_charge->type == 0) ? number_format($wth_charge->amount, 2) . '%' :
            $currency_short . ' ' . number_format($wth_charge->amount, 2);

        $payment_ids = [];

        foreach($payments as $row)
        {
            $payment_ids[] = '#payment-method'. $row->id;
        }

        $payment_string = implode(',', $payment_ids);

        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
 

        return view('user.withdraw', compact('payments', 'title', 'page_title', 'payment_string', 'currency', 'currency_short',
            'charge', 'processing_time', 'minimum_withdrawal', 'maximum_withdrawal', 'user', 'ref_id'));
    }

    public function withdraw(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required|min:1',
            'payment_id' => 'required',
            'address' => 'required',
        ]);

        $user = auth()->user();
       
        $amount = $validate['amount'];
        $balance = $this->_user_service->get_balance($user->id);

        $withdrawal_charge =  $this->_user_service->get_setting('withdrawal-charges');
        $minimum = $this->_user_service->get_setting('minimum-withdrawal');
        $wth_charge = json_decode($withdrawal_charge);

        $charges = ($wth_charge->type == 0) ? ($wth_charge->amount / 100) * $amount : $wth_charge->amount;

        

        $debit = $amount + $charges;

        if($balance < $debit || $amount < $minimum )
        {
            return back()->withErrors(['amount' => 'Amount specified is less than your available balance or the minimum withdrawal!']);
        }

        $desc = 'Debit for withdrawal of ' . $this->_currency_short . number_format($amount, 2) . ', with charges of ' . $this->_currency_short . number_format($charges, 2);

        // debit user
        
        $this->_user_service->debit_user($user->id, $debit, 3, $desc);


        // save withdrawal 
        $withdrawal = $this->_withdrawal_service->make_withdrawal([
            'user_id' => $user->id,
            'payment_id' => $validate['payment_id'],
            'amount' => $amount,
            'address' => $validate['address'],
            'charges' => $charges,
        ]);

        try 
        {
            if(setting('withdrawal-notification'))
            {
                event(new NewWithdrawal($withdrawal));
            }
        }
        catch (Throwable $e)
        {
            report($e);
        }

        return redirect()->route('user.withdraw')
            ->with([
                'success' => 'Withdrawal request successfully initiated, it will be processed shortly.'
            ]);

    }

    public function withdrawals()
    {
        $title = 'My Withdrawals';
        $page_title = 'My Withdrawals';
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
        $currency = $this->_currency_short;
        $withdrawals = $this->_withdrawal_service->get_user_withdrawals($user->id);

        return view('user.withdrawals', compact('title', 'page_title', 'user', 'ref_id', 'withdrawals', 'currency'));
    }
}
