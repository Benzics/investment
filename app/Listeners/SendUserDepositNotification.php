<?php

namespace App\Listeners;

use App\Events\NewDeposit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserDepositNotification
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
        //
    }
}
