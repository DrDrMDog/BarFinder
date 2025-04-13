<?php

namespace App\Providers;

use App\Application\Auth\Contracts\AuthenticatorInterface;
use App\Infrastructure\Auth\LaravelAuthenticator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticatorInterface::class, LaravelAuthenticator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
