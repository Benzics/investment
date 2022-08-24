<?php

namespace App\Listeners;

use App\Events\WithdrawalApproved;
use App\Mail\WithdrawalApproved as MailWithdrawalApproved;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWithdrawalApprovedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\WithdrawalApproved  $event
     * @return void
     */
    public function handle(WithdrawalApproved $event)
    {
        $user = User::find($event->withdrawal->user_id);
        Mail::to($user)->send(new MailWithdrawalApproved($event->withdrawal));
    }
}
