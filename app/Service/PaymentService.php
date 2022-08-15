<?php
namespace App\Services;

use App\Models\Deposit;
use App\Models\Payment;

class PaymentService {

    /**
     * Get active payment methods
     * @return
     */
    public function get_active_payments()
    {
        $payment_methods = Payment::where('status', '1')->get();

        return $payment_methods;
    }

    /**
     * Get a payment method
     * @param $payment_id
     */
    public function get_payment(int $payment_id)
    {
        $payment = Payment::find($payment_id);

        return $payment;
    }

    /**
     * Makes a new deposit
     * @param $data
     */
    public function make_deposit(array $data)
    {
        $deposit = Deposit::create($data);

        return $deposit;
    }

}