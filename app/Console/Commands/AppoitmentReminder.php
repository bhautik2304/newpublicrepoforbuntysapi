<?php

namespace App\Console\Commands;

use App\Models\costumer;
use App\Models\appointment;
use Illuminate\Console\Command;
use App\Jobs\AppoitmentReminderjob;
use App\Models\taskupdate;

class AppoitmentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artisan:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Appointment Reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $time = date('H:i');
        $date = date('Y-m-d');
        $beforeOneHour = date('H:i', strtotime($time . '+ 1 hours'));
        $appoitment = appointment::where('appoitment_time',$beforeOneHour)->first();

        if ($appoitment) {
            # code...
            $smsReminder = new appointment;
            $smsReminder->reminderAppoitmentSms($appoitment->appoitment_date,$appoitment->appoitment_time,$appoitment->storeid,$appoitment->costomer_id);
            echo "Remind Appointment send";
            $task = new taskupdate;
            $task->task_msg = "Remind Appointment send $beforeOneHour";
            $task->task_desciption="Appouintment found  $date $time Remind Appointment send $beforeOneHour";
            $task->status =1;
            $task->save();
            return 0;
        }else {
            # code...
            $task = new taskupdate;
            $task->task_msg = "No Appoitment Found $beforeOneHour";
            $task->task_desciption="No  $date Appoitment Found $beforeOneHour";
            $task->status =0;
            $task->save();
            echo "No Appoitment Found";
            return 0;
        }
    }
}
