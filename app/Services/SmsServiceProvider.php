<?php
namespace App\Services;

use App\Traits\getSmsTemplate;

class SmsServiceProvider implements SmsServiceInterface{
    use getSmsTemplate;

    public function smsService()
    {
        # code...
    }

    public function sendContentSms($id,$replaceParam)
    {
        # code...
       return $this->smsTeplate($id,$replaceParam);
    }
}
