<?php
namespace App\Services\SmsSender\providers;

use App\Services\SmsSender\src\SmsResponse;
use App\Services\SmsSender\src\SmsSenderParent;
use GuzzleHttp\Client;

class Melipayamak extends SmsSenderParent
{
    use SmsResponse;
    public function send(string $message, array $data)
    {
        $client = new Client();
        $req = $client->post("https://console.melipayamak.com/api/send/shared/" . $this->config['token'], [
            "json" => [
                "bodyId" => 66844,
                "to" => $data['to'],
                "args" => [$message]
            ]
        ]);
        if ($req->getStatusCode() == 200)
            return $this->success();
        return $this->field($req->getBody(), $req->getStatusCode());
    }

    public function report(int $id)
    {
        throw new \Exception("This featur is not supported in Melipayamak SMS provider :(");
    }
}