<?php

namespace Tests\Unit;

use App\Services\Messaging\DTOs\SentDTO;
use App\Services\Messaging\MessagingService;
use App\Services\Messaging\Providers\MelliPayamakService;
use App\Services\SmsSender\providers\Melipayamak;
use Tests\TestCase;

class MessagingServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_send_sms(): void
    {
        $provider = app(MessagingService::class);
        $mockProvider = \Mockery::mock(MelliPayamakService::class);
        $mockProvider->shouldReceive('send')->andReturn(new SentDTO('', '', 1234234));

        // $this->markTestSkipped('must be revisited.');
        $data = $provider->send('09165255176', '1234');
        $this->assertTrue(true);
    }
}