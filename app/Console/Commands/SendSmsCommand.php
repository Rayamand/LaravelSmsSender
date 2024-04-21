<?php

namespace App\Console\Commands;

use App\Services\Messaging\MessagingService;
use App\Services\SmsSender\SmsSender;
use Illuminate\Console\Command;

class SendSmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-sms {--recepient=09125591174} {--text= Text of message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(MessagingService $messagingService)
    {
        $recepient = $this->option('recepient');
        $text = $this->option('text');
        $messagingService->send($recepient, $text);
    }
}