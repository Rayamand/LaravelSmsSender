<?php

namespace App\Console\Commands;

use App\Services\SmsSender\SmsSender;
use Illuminate\Console\Command;

class SendSmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sender = new SmsSender();
        // dd($sender->sned("1234", ["to" => "09106125186"]));
        dd($sender->send("1234", ["to" => "09106125186"]));
        // dd($sender->report(678270935));
    }
}