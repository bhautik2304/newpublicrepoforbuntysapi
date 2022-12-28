<?php
namespace App\Traits;
use App\Models\service;

/**
 *
 */

trait getTimeDate
{
    public function getAppoitmentEndTime($serviceId,$time)
    {
        # code...
        $service=service::where('id',$serviceId)->first();
       return date('H:i', strtotime($time . " + $service->service_time"));
    }

    public function getAppoitmentDays($serviceId,$date)
    {
        # code...
        $service=service::where('id',$serviceId)->first();
       return date('Y-m-d', strtotime($date . " + $service->service_duration"));
    }
}
