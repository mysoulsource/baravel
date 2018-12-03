<?php

namespace App\Mail;

use App\Demand;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendDemandResponseMail extends Mailable
{
    use Queueable, SerializesModels;
    public $demand;
    public $demanded_by;
    public $accepted_by;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Demand $demand)
    {
        $this->demand = $demand;

        $this->demanded_by =User::findOrFail($this->demand->added_by);
        $this->accepted_by =User::findOrFail($this->demand->accepted_by);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->demanded_by->email)
            ->markdown('email.demandresponse');
    }
}
