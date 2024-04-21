<?php
namespace App\Services\Messaging;

use App\Services\Messaging\DTOs\SentDTO;

interface MessagingInterface
{
    public function send(string $recepient, string $text): SentDTO;
    public function report(string $id): bool;
}