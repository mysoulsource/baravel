<?php

namespace App\Listeners;

use App\Events\SendDemandResponseEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SendDemandResponseMail;
use Mail;

class SendDemandResponseMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendDemandResponseEvent  $event
     * @return void
     */
    public function handle(SendDemandResponseEvent $event)
    {
        $email = new SendDemandResponseMail($event->demand);
        Mail::send($email);
    }
}
