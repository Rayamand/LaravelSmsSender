<?php
namespace App\Services\Messaging\Providers;

use App\Services\Messaging\DTOs\SentDTO;
use App\Services\Messaging\MessagingInterface;
use Exception;
use GuzzleHttp\Client;

class MelliPayamakService implements MessagingInterface
{
    private string $token;
    private string $baseUri;

    public function __construct()
    {
        $this->baseUri = config('messaging.providers.melipayamak.uri');
        $this->token = config('messaging.providers.melipayamak.token');
    }

    public function send(string $recepient, string $text): SentDTO
    {
        $client = new Client();
        $req = $client->post("{$this->baseUri}/send/shared/{$this->token}", [
            "json" => [
                "bodyId" => 66844,
                "to" => $recepient,
                "args" => [$text]
            ]
        ]);
        if ($req->getStatusCode() == 200) {
            $content = json_decode($req->getBody(), true);
            return new SentDTO(
                recepient: $recepient,
                text: $text,
                identifier: $content['recId']
            );
        }
        throw new Exception('Error send sms');

    }

    public function report(string $id): bool
    {
        return true;
    }
}