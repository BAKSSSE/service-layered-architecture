<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Interface\RegisterUserRepositoryInterface;
use App\Repository\Database\RegisterUserRepository;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        $this->app->bind(
            RegisterUserRepositoryInterface::class,
            function (Application $app) {
                return new RegisterUserRepository($app->make('db'));
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
