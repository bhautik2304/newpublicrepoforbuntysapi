<?php
namespace App\Services;

use App\Traits\getSmsTemplate;
use GuzzleHttp\Client;
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

    private $client;
    private $apiKey;

    public function __construct(Client $client, $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function sendSms($message, $numbers)
    {
        $response = $this->client->post('https://api.txtlocal.com/send/', [
            'form_params' => [
                'apiKey' => $this->apiKey,
                'message' => $message,
                'numbers' => $numbers,
                'sender' => 'TXTLCL',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


}
