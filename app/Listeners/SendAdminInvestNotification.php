<?php

namespace App\Listeners;

use App\Events\Invested;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewInvestmentAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAdminInvestNotification
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
        $event;
        Mail::to(setting('admin-mail'))->send(new NewInvestmentAdmin());
    }
}
