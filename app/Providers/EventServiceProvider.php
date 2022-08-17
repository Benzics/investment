<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Listeners\SendAdminInvestNotification;
use App\Listeners\SendUserInvestNotification;
use App\Listeners\SendAdminRegisterNotification;
use App\Events\Invested;
use App\Events\NewDeposit;
use App\Listeners\SendAdminDepositNotification;
use App\Listeners\SendUserDepositNotification;
use App\Events\NewWithdrawal;
use App\Listeners\SendUserWithdrawalNotification;
use App\Listeners\SendAdminWithdrawalNotification;
use App\Events\DepositApproved;
use App\Listeners\SendDepositApprovedNotification;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendAdminRegisterNotification::class,
        ],
        Invested::class => [
            SendAdminInvestNotification::class,
            SendUserInvestNotification::class,
        ],
        NewDeposit::class => [
            SendAdminDepositNotification::class,
            SendUserDepositNotification::class,
        ],
        NewWithdrawal::class => [
            SendUserWithdrawalNotification::class,
            SendAdminWithdrawalNotification::class,
        ],
        DepositApproved::class => [
            SendDepositApprovedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
