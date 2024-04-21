<?php
namespace App\Services\Messaging;

class MessagingService
{
    public function __construct(protected MessagingInterface $messagingInterface)
    {

    }

    public function changeProvider(MessagingInterface $provider): self
    {
        $this->messagingInterface = $provider;
        return $this;
    }

    public function send(string $recepient, string $text): int
    {
        $sentSmsData = $this->messagingInterface->send($recepient, $text);
        return $sentSmsData->identifier;
    }

    public function report(string $id): bool
    {
        return $this->messagingInterface->report($id);
    }
}