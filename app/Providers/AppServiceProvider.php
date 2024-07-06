<?php

namespace App\Providers;

use App\Events\UserRegisterEvent;
use App\Listeners\UserRegisterListener;
use App\Services\BrandService;
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
        $brandService = $this->app->make(BrandService::class);
        $brandsColumns = $brandService->getAllActive();
        view()->composer('front.*', function ($view) use ($brandsColumns){
            $view->with("brandsColumns", $brandsColumns);
        });
    }
}
