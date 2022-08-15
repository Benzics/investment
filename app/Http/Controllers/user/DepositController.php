<?php

namespace App\Http\Controllers\user;

use App\Events\NewDeposit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Http\Controllers\core\UserController;
use App\Services\PaymentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class DepositController extends UserController
{

    public $_payment_service;

    public function __construct()
    {
        parent::__construct();

        $this->_payment_service = new PaymentService();

    }

    public function index() : View
    {
        $payments = $this->_payment_service->get_active_payments();

        $deposit_charge = $this->_user_service->get_setting('deposit-charges');
        $dep_charge = json_decode($deposit_charge);

        $currency_short = $this->_currency_short;

        $charge = ($dep_charge->type == 0) ?
            number_format($dep_charge->amount, 2) . '%' :
            $currency_short . ' ' . number_format($dep_charge->amount, 2);

        $payment_ids = [];

        foreach($payments as $row)
        {
            $payment_ids[] = '#payment-method'. $row->id;
        }

        $payment_string = implode(',', $payment_ids);

        $user = auth()->user();

       $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;

       $view_data = [
            'title' => 'Deposit', 
            'page_title' => 'Deposit Method',
            'payments' => $payments,
            'payment_string' => $payment_string,
            'currency' => $currency_short,
            'charges' => $charge,
            'user' => $user,
            'ref_id' => $ref_id,
        ];

        return view('user.deposit', $view_data);
    }

    public function deposit(Request $request) : View
    {
        $validate = $request->validate([
            'amount' => 'required',
            'payment_id' => 'required',

        ]);

        $deposit_charge = setting('deposit-charges');
        $dep_charge = json_decode($deposit_charge);


        $currency_short = $this->_currency_short;

        $payment = $this->_payment_service->get_payment($validate['payment_id']);

        $amount = $validate['amount'];

        $charges = ($dep_charge->type == 0) ? ($dep_charge->amount / 100) * $amount : $dep_charge->amount;

        if(!$payment)
        {
            return redirect()->route('user.deposit')->with(['error' => 'Invalid payment method']);
        }

        $user = auth()->user();

       $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;
       $view_data = [
            'title' => 'Deposit',
            'page_title' => 'Deposit Preview',
            'payment' => $payment,
            'amount' => $request->amount,
            'charges' => $charges,
            'currency' => $currency_short,
            'user' => $user,
            'ref_id' => $ref_id,
        ];

        return view('user.deposit-fund', $view_data);
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'attachment' => ['required', File::image()],
            'amount' => 'required|min:1',
            'payment_id' => 'required',
        ]);

         // rettrieve the deposit settings 
      
        $deposit_charge = setting('deposit-charges');
        $dep_charge = json_decode($deposit_charge);
        
        $charges = ($dep_charge->type == 0) ? ($dep_charge->amount / 100) * $request->amount : $dep_charge->amount;
        
        $attachment = $request->file('attachment')->store('deposits', 'public');
        $user = auth()->user();

        $deposit = $this->_payment_service->make_deposit([
            'user_id' => $user->id,
            'payment_id' => $request->payment_id,
            'attachment' => $attachment,
            'amount' => $request->amount,
            'charges' => $charges,
            'description' => $request->description,
            'total' => $request->amount + $request->charges,
            'status' => '0',
        ]);

        try 
        {
            if(setting('deposit-notification'))
            {
                event(new NewDeposit($deposit));
            }
            
        }
        catch (Throwable $e)
        {
            report($e);
        }


        return redirect()->route('user.deposit')
            ->with(['success' => 'Your proof has been uploaded. Please wait, it will be reviewed shortly.']);
    }

    public function deposits()
    {
        $title = 'My Deposits';
        $page_title = $title;
        $user = auth()->user();
        $currency = $this->_currency_short;

        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;

        $deposits = $this->_user_service->get_user_deposits($user->id);

        return view('user.deposits', compact('title', 'page_title', 'user', 'ref_id', 'currency', 'deposits'));
    }
}
