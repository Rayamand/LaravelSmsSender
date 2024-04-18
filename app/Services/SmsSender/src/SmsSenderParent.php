<?php
namespace App\Services\SmsSender\src;


abstract class SmsSenderParent
{
    use SmsResponse;
    function __construct(protected array $config = [])
    {
    }
    abstract function send(string $message, array $data);

    abstract function report(int $id);
}