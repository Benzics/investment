<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewInvestmentAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = url('/admin/login');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-investment-admin');
    }
}
