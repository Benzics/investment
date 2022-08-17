<?php

namespace App\Listeners;

use App\Events\DepositApproved;
use App\Mail\DepositApproved as MailDepositApproved;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendDepositApprovedNotification
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
     * @param  \App\Events\DepositApproved  $event
     * @return void
     */
    public function handle(DepositApproved $event)
    {
        $user = User::find($event->deposit->user_id);
        Mail::to($user)->send(new MailDepositApproved($event->deposit));
    }
}
