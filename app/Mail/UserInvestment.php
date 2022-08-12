<?php

namespace App\Mail;

use App\Models\Investment;
use App\Models\User;
use App\Models\UserInvestment as ModelsUserInvestment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserInvestment extends Mailable
{
    use Queueable, SerializesModels;

    public $investment;
    public $investment_name;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModelsUserInvestment $investment)
    {
        $this->investment = $investment;

        $selected_investment = Investment::findOrFail($investment->investment_id);
        $this->investment_name = $selected_investment->name;

        $user = User::find($investment->user_id);
        $this->user = $user->name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-user-investment')
        ->subject('Your investment has successfully been placed');
    }
}
