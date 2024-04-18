<?php
namespace App\Services\SmsSender\src;


trait SmsResponse
{
    public function success(string $message = "sms sended succesfuly!")
    {
        return [
            "status" => 201,
            "message" => $message
        ];
    }

    public function field(string $message, int $status)
    {
        return [
            "status" => $status,
            "message" => $message
        ];
    }

}