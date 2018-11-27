<?php

namespace App\Jobs;

use App\Mail\SendResponseMail;
use App\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Request as Donate;
use Mail;
use App\user;

class SendResponseMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public  $donate;
    public $requested_by;


    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendResponseMail($this->donate);
        Mail::to($this->requested_by->email)->send($email);
    }
}
