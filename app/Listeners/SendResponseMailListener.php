<?php

namespace App\Listeners;

use App\Events\SendResponseEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SendResponseMail;
use Mail;

class SendResponseMailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  SendResponseEvent  $event
     * @return void
     */
    public function handle(SendResponseEvent $event)
    {
        $email = new SendResponseMail($event->donate);
        Mail::send($email);
    }
}
