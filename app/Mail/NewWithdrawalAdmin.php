<?php

namespace App\Mail;

use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NewWithdrawalAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal;
    public $user_mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Withdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal;

        $user = User::find($withdrawal->user_id);
        $this->user_mail = $user->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin-withdrawal-notification')
            ->subject('New withdrawal initiated');
    }
}
