<?php

namespace App\Listeners;

use App\Events\NewWithdrawal;
use App\Mail\NewWithdrawalAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminWithdrawalNotification
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
        Mail::to(setting('admin-mail'))->send(new NewWithdrawalAdmin($event->withdrawal));
    }
}
