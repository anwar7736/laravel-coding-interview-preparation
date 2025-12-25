<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class BulkMailSend implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $users)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->users as $user) {
            Mail::raw("Hello $user->name, welcome to our platform!", function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Welcome Email');
            });
        }
    }
}
