<?php
namespace App\Services\Messaging\DTOs;

use Carbon\Carbon;

class SentDTO
{
    public function __construct(
        public string $recepient,
        public string $text,
        public int $identifier,
        public ?Carbon $now = null
    ) {
        if (!$now) {
            $this->now = now();
        }
    }
}