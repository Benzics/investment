<?php

namespace App\Listeners;

use App\Events\NewWithdrawal;
use App\Mail\NewWithdrawalUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserWithdrawalNotification
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
     * @param  \App\Events\NewWithdrawal  $event
     * @return void
     */
    public function handle(NewWithdrawal $event)
    {
        $user = User::find($event->withdrawal->user_id);
        Mail::to($user)->send(new NewWithdrawalUser($event->withdrawal));
    }
}
