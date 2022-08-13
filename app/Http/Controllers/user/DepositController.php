<?php

namespace App\Http\Controllers\user;

// use App\Http\Controllers\Controller;

use App\Events\NewDeposit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Deposit;
use App\Models\Payment;
use App\Models\Setting;
use App\Http\Controllers\core\UserController;
use App\Models\User;
use App\Services\UserService;
use Throwable;

class DepositController extends UserController
{


    public function index()
    {
        $payments = Payment::where('status', '1')->get();

        $deposit_charge = $this->_get_setting('deposit-charges');
        $dep_charge = json_decode($deposit_charge);

        $currency_short = $this->_currency_short;

        $charge = ($dep_charge->type == 0) ? number_format($dep_charge->amount, 2) . '%' :
            $currency_short . ' ' . number_format($dep_charge->amount, 2);
        $payment_ids = [];

        foreach($payments as $row)
        {
            $payment_ids[] = '#payment-method'. $row->id;
        }

        $payment_string = implode(',', $payment_ids);

        $user = auth()->user();

        $ref_id = User::findOrFail($user->id)->profile->ref_id;


        return view('user.deposit', ['title' => 'Deposit', 'page_title' => 'Deposit Method',
            'payments' => $payments, 'payment_string' => $payment_string, 'currency' => $currency_short, 'charges' => $charge,
            'user' => $user, 'ref_id' => $ref_id]);
    }

    public function deposit(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required',
            'payment_id' => 'required',

        ]);

        $deposit_charge = Setting::where('name', 'deposit-charges')->firstOrFail();
        $dep_charge = json_decode($deposit_charge->value);


        $currency_short = $this->_currency_short;

        $payment = Payment::find($validate['payment_id']);

        $amount = $validate['amount'];

        $charges = ($dep_charge->type == 0) ? ($dep_charge->amount / 100) * $amount : $dep_charge->amount;

        if(!$payment)
        {
            return redirect()->route('user.deposit')->with(['error' => 'Invalid payment method']);
        }

        $user = auth()->user();

        $ref_id = User::findOrFail($user->id)->profile->ref_id;

        return view('user.deposit-fund', ['title' => 'Deposit', 'page_title' => 'Deposit Preview', 
            'payment' => $payment, 'amount' => $request->amount, 'charges' => $charges, 'currency' => $currency_short,
            'user' => $user, 'ref_id' => $ref_id]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'attachment' => ['required', File::image()],
            'amount' => 'required|min:1',
            'payment_id' => 'required',
        ]);

         // rettrieve the deposit settings 
      
        $deposit_charge = Setting::where('name', 'deposit-charges')->firstOrFail();
        $dep_charge = json_decode($deposit_charge->value);
        
        $charges = ($dep_charge->type == 0) ? ($dep_charge->amount / 100) * $request->amount : $dep_charge->amount;
        
        $attachment = $request->file('attachment')->store('deposits');
        $user = auth()->user();

        $deposit = Deposit::create([
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

    public function deposits(UserService $user_service)
    {
        $title = 'My Deposits';
        $page_title = $title;
        $user = auth()->user();
        $currency = $this->_currency_short;

        $ref_id = User::findOrFail($user->id)->profile->ref_id;

        $deposits = $user_service->get_user_deposits($user->id);

        return view('user.deposits', compact('title', 'page_title', 'user', 'ref_id', 'currency', 'deposits'));
    }
}
