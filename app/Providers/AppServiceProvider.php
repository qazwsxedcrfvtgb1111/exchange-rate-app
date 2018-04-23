<?php

namespace App\Providers;

use App\ExchangeApi\ExchangeApi;
use App\ExchangeApi\FixerApi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExchangeApi::class, FixerApi::class);
    }
}
