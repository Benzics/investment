<?php

namespace App\Listeners;

use App\Events\Invested;
use App\Mail\UserInvestment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserInvestNotification
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
     * @param  \App\Events\Invested  $event
     * @return void
     */
    public function handle(Invested $event)
    {
        Mail::to($event->user_mail)->send(new UserInvestment($event->investment));
    }
}
