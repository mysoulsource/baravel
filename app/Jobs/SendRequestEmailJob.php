<?php

namespace App\Jobs;

use App\Mail\SendRequestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Request;
use App\User;
use Mail;

class SendRequestEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $request;
    public $requested_by;
    public $requested_to;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $email = new SendRequestMail($this->request);
       Mail::to($this->requested_to->email)->send($email);
    }
}
