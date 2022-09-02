<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DueEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $setting;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($setting)
    {
        $this->setting = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('for paying' .'  '.config('custom.installment_types')[$this->setting->batch_installment->installment_type].' installment')->markdown('emails.due_email');
    }
}
