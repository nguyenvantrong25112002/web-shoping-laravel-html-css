<?php

namespace App\Jobs;

use App\Events\SendMail;
use App\Events\SendMailSignUpEvent;
use Illuminate\Bus\Queueable;
use App\Mail\SendMailSignUpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailSignUpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $data;
    protected $email;

    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data = $data;
        $this->queue = 'email';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        event(new SendMailSignUpEvent($this->email, $this->data));  // events
    }
}