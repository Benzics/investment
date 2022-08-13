<?php

namespace App\Listeners;

use App\Events\NewWithdrawal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
