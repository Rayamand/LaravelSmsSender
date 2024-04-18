<?php
namespace App\Services\SmsSender;

use Illuminate\Support\Str;

class SmsSender
{
    private $provider;
    public $sender;
    function __construct()
    {
        $this->provider = config("sms.default");
        $class = __NAMESPACE__ . "\Providers\\" . Str::lower($this->provider);
        $config = config("sms.providers." . Str::lower($this->provider));
        // dd($config);
        if (!$config)
            throw new \Exception("SMS Provider is not defined");
        $this->sender = new $class($config);
    }
}