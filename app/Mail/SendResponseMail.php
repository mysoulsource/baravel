<?php

namespace App\Mail;

use App\Request as Donate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendResponseMail extends Mailable
{
    use Queueable, SerializesModels;
    public $donate;
    public $requested_by;
    public $requested_to;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Donate $donate)
    {
        $this->donate = $donate;

        $this->requested_to =User::findOrFail($this->donate->requested_to);
        $this->requested_by =User::findOrFail($this->donate->requested_by);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.response');
    }
}
