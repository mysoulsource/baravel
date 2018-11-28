<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Request;
use App\User;


class SendRequestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $requested_by;
    public $requested_to;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->requested_to =User::findOrFail($this->request->requested_to);
        $this->requested_by =User::findOrFail($this->request->requested_by);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->requested_to->email)
            ->markdown('email.request');
    }
}
