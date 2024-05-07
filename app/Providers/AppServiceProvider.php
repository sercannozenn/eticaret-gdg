<?php

namespace App\Providers;

use App\Events\UserRegisterEvent;
use App\Listeners\UserRegisterListener;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        UserRegisterEvent::class => [
            UserRegisterListener::class
        ]
    ];

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
        Paginator::useBootstrapFive();

    }
}
