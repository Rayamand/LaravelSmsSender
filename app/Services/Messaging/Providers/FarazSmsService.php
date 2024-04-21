<?php
namespace App\Services\Messaging\Providers;

use App\Services\Messaging\DTOs\SentDTO;
use App\Services\Messaging\MessagingInterface;
use Exception;
use GuzzleHttp\Client;
use stdClass;

class FarazSmsService implements MessagingInterface
{
    private string $baseUri;
    private string $username;
    private string $password;
    private string $number;

    public function __construct()
    {
        $this->baseUri = config('messaging.providers.farazsms.uri');
        $this->username = config('messaging.providers.farazsms.username');
        $this->password = config('messaging.providers.farazsms.password');
        $this->number = config('messaging.providers.farazsms.number');
    }

    public function send(string $recepient, string $text): SentDTO
    {
        $client = new Client();
        $req = $client->post("{$this->baseUri}select", [
            "json" => [
                "op" => "pattern",
                "user" => $this->username,
                "pass" => $this->password,
                "fromNum" => $this->number,
                "toNum" => $recepient,
                "patternCode" => 'pattern',
                "inputData" => [
                    ["verification-code" => $text]
                ]
            ]
        ]);
        if ($req->getStatusCode() == 200) {
            $content = json_decode($req->getBody());
            return new SentDTO(
                text: $text,
                recepient: $recepient,
                identifier: $content->indentifier
            );
        }
        throw new Exception('Error');
    }

    public function report(string $id): bool
    {
        return true;
    }
}