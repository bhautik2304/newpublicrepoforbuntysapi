<?php
namespace App\Services;

use App\Models\costumer;
use App\Models\store;
use App\Models\taskupdate;

trait sendSms
{
    public static function bookAppoitmentSms($date, $time, $storeId, $costomerId)
    {

        $store = store::where('id', $storeId)->first();
        $costomer = costumer::where('id', $costomerId)->first();

        $dateTime = date('D d M', strtotime($date)) . ' ' . date('h:i A', strtotime($time));
        # code...
        $apiKey = urlencode('NjQ1NzMzNjU0ZDQzNGQ2NDZjNTA1NDU1NTk3MTU5NmI=');

        // Message details
        $numbers = array("91$costomer->mobaile");
        $sender = urlencode('BUMSTO');
        $message = "HI $costomer->name $costomer->last_name , your appointment schedule is confirmed on $dateTime with $store->name $store->city , . Bunty's Hair & Skin Studio";

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // $task = new taskupdate;
        // $task->task_msg = $response;
        // $task->save();
        // Process your response here
    }

    public static function reminderAppoitmentSms($date, $time, $storeId, $costomerId)
    {

        $store = store::where('id', $storeId)->first();
        $costomer = costumer::where('id', $costomerId)->first();

        $dateTime = date('D d M', strtotime($date)) . ' ' . date('h:i A', strtotime($time));
        # code...
        $apiKey = urlencode('NjQ1NzMzNjU0ZDQzNGQ2NDZjNTA1NDU1NTk3MTU5NmI=');

        // Message details
        $numbers = array("91$costomer->mobaile");
        $sender = urlencode('BUMSTO');
        $message = "HI $costomer->name $costomer->last_name , your appointment schedule is confirmed on $dateTime with $store->name $store->city , . Bunty's Hair & Skin Studio";

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // $task = new taskupdate;
        // $task->task_msg = $response;
        // $task->save();
        // Process your response here
    }
}
