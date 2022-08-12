<?php

namespace App\Events;

use App\Models\User;
use App\Models\UserInvestment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Invested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $investment;
    public $user_mail;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserInvestment $invest, $user_mail)
    {

        $this->investment = $invest;
        $this->user_mail = $user_mail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
