<?php

namespace App\Jobs;

use App\Models\appointment;
// use App\Models\appoitment;
use App\Models\costumer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AppoitmentReminderjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userId;
    public $appoitment;
    // public $userId;
    // public $userId;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId,$appoitment)
    {
        //
        $this->userId = $userId;
        $this->appoitment = $appoitment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // $costomer = costumer::where('id', $this->userId)->first();
        // // $costomer->reminderAppoitmentSms();
        // $sms=new appointment;
        // $sms->reminderAppoitmentSms()
    }
}
