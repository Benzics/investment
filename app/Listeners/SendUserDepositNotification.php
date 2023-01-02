<?php

namespace App\Listeners;

use App\Events\NewDeposit;
use App\Mail\NewDepositUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserDepositNotification implements ShouldQueue
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
     * @param  \App\Events\NewDeposit  $event
     * @return void
     */
    public function handle(NewDeposit $event)
    {
        $user = User::find($event->deposit->user_id);
        Mail::to($user)->send(new NewDepositUser($event->deposit));

    }
}
