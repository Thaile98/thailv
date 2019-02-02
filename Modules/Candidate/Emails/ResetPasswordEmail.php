<?php

namespace Modules\Candidate\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $candidate;
    public $str_random;

    public function __construct($candidate,$str_random)
    {
        $this->candidate = $candidate;
        $this->str_random = $str_random;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirm_email_reset_password');
    }
}
