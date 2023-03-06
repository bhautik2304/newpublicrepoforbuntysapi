<?php

namespace App\Http\Controllers;

use App\Events\storeUpdate;
use Sms;
use Illuminate\Http\Request;

class testController extends Controller
{
    //
    // public function sendSms(Sms $sms)
    // {
    //     # code...

    //     // dd(config('sms.smsConst'));
    //     return $sms->sendContentSms(1,[
    //         'Buntys',
    //         'Bhautik Rathod',
    //         'Vadodra',
    //         '[feedback_link]',
    //         '2023-01-25',
    //         '12:20:10',
    //         '[appointment_confirmation]',
    //         '[feedback_link]',
    //         '[offers_code]',
    //         '[voucher_code]',
    //         '[rewardpoint_code]',
    //         '[costomer_offers_code]'
    //         ]);
    // }

    public function testChannel()
    {
        # code...
        event(new storeUpdate(["msg"=>"hello"]));
    }
    public function wtestChannel()
    {
        # code...
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://graph.facebook.com/v15.0/103184062700693/messages', [
            'headers' => [
                'Authorization' => 'Bearer EAASqZCxYzycYBAGumZBkFd8nwnROZCx8WW9F1fxzDy9mIftp4S2hJGE8WP746uJlCEssQ3OfmIgj5kkh8M5c3lNVoQGcSepVvF3OreH87VojCbLAaMtsbRXCzqNTeyHjTL9O3EDkIhHHaAZA4zu6l11uKLN7jLcaaBmVbDnziiup8ilLkuiCJGOMf6nx7tpV0PZAm8QsdYxcBj9jx7s07b4i17M5ZC6ksZD',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "messaging_product" => "whatsapp",
                "to" => "916358006532",
                "type" => "template",
                "template" => [
                    "name" => "hello_world",
                    "language" => [
                        "code" => "en_US",
                    ],
                ],
            ],
        ]);
        return $response->getBody()->getContents();
    }
}
