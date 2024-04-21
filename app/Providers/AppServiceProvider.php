<?php

namespace App\Providers;

use App\Services\Messaging\MessagingInterface;
use App\Services\Messaging\Providers\MelliPayamakService;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $smsProvider = config("messaging.default");
        $provider = config("messaging.providers.{$smsProvider}.service");
        $provider = is_subclass_of($provider, MessagingInterface::class) ? $provider : MelliPayamakService::class;
        $this->app->bind(MessagingInterface::class, $provider);
    }
}