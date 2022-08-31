<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdmissionEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $admission;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admission)
    {
        $this->admission = $admission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('for admission')->markdown('emails.admission_email');
    }
}
