<?php

namespace App\Listeners;

use App\Events\SendRequestEvent;
use App\Mail\SendRequestMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendRequestMailListener implements ShouldQueue
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
     * @param  SendRequestEvent  $event
     * @return void
     */
    public function handle(SendRequestEvent $event)
    {

        $email = new SendRequestMail($event->request);
        Mail::send($email);

    }
}
