<?php
// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RequestExtraction;
use App\Services\PhoneExtraction;
use App\Services\URLExtraction;
use App\Services\EmailExtraction;
use App\Services\Parser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RequestExtraction::class, function ($app) {
            return new RequestExtraction();
        });

        $this->app->singleton(PhoneExtraction::class, function ($app) {
            return new PhoneExtraction();
        });

        $this->app->singleton(URLExtraction::class, function ($app) {
            return new URLExtraction();
        });

        $this->app->singleton(EmailExtraction::class, function ($app) {
            return new EmailExtraction();
        });

        $this->app->singleton(Parser::class, function ($app) {
            return new Parser(
                $app->make(RequestExtraction::class),
                $app->make(PhoneExtraction::class),
                $app->make(URLExtraction::class),
                $app->make(EmailExtraction::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
