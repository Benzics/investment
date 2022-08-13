<?php

namespace App\Listeners;

use App\Events\NewDeposit;
use App\Mail\NewDepositAdmin;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminDepositNotification
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
       
        Mail::to(setting('admin-mail'))->send(new NewDepositAdmin($event->deposit));
    }
}
