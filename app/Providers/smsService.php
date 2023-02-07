<?php

namespace App\Providers;

use App\Services\{SmsServiceProvider,SmsServiceInterface};
use Illuminate\Support\ServiceProvider;

class smsService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(SmsServiceInterface::class,SmsServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
