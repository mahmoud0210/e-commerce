<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\emailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmailToAllUsersjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

 /**
 * The number of seconds the job can run before timing out.
 *
 * @var int
 */
public $timeout = 1200;

/**
 * The number of seconds to wait before retrying the job.
 *
 * @var int
 */
public $backoff = 120;


    /**
     * Create a new job instance.
     *
     * @return void
     */

     protected $users;
     protected $data;
    public function __construct($users,$data)
    {
        $this->users=$users;
        $this->data=$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {

            Notification::send($this->users,new emailNotification($this->data));

    }
}
