<?php
namespace App\Services\SmsSender\providers;

use App\Services\SmsSender\src\SmsResponse;
use App\Services\SmsSender\src\SmsService;
use GuzzleHttp\Client;

class Farazsms extends SmsService
{
    use SmsResponse;
    public function send(string $message, array $data)
    {
        $client = new Client();
        $req = $client->post("https://ippanel.com/api/select", [
            "json" => [
                "op" => "pattern",
                "user" => $this->config['username'],
                "pass" => $this->config['password'],
                "fromNum" => $this->config['number'],
                "toNum" => $data['to'],
                "patternCode" => $data['pattern'],
                "inputData" => [
                    ["verification-code" => $message]
                ]
            ]
        ]);
        if ($req->getStatusCode() == 200)
            return $this->success($req->getBody()->getContents());
        return $this->field($req->getBody()->getContents(), $req->getStatusCode());
    }

    public function report(int $id)
    {
        $client = new Client();
        $req = $client->post("https://ippanel.com/api/select", [
            "json" => [
                "op" => "checkmessage",
                "uname" => $this->config['username'],
                "pass" => $this->config['password'],
                "messageid" => $id
            ]
        ]);
        if ($req->getStatusCode() == 200)
            return json_decode($req->getBody()->getContents(), true);
        return ["status" => $req->getStatusCode(), "message" => "Somthing wrong."];
    }
}