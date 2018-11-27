<?php

namespace App\Listeners;

use App\Events\SendRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\SendRequestMail as SRM;

class SendRequestMail
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
     * @param  SendRequest  $event
     * @return void
     */
    public function handle(SendRequest $event)
    {
        dd($event);
//        Mail::to($requested_to->email)->send(new SRM($event->request));
    }
}
