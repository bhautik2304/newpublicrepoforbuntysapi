<?php

namespace App\Http\Controllers;

use Sms;
use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function sendSms(Sms $sms)
    {
        # code...

        // dd(config('sms.smsConst'));
        return $sms->sendContentSms(1,[
            'Buntys',
            'Bhautik Rathod',
            'Vadodra',
            '[feedback_link]',
            '2023-01-25',
            '12:20:10',
            '[appointment_confirmation]',
            '[feedback_link]',
            '[offers_code]',
            '[voucher_code]',
            '[rewardpoint_code]',
            '[costomer_offers_code]'
            ]);
    }
}
