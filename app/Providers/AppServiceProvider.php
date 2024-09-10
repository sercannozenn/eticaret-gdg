<?php

namespace App\Providers;

use App\Events\UserLoggedIn;
use App\Events\UserRegisterEvent;
use App\Listeners\CardTransferListener;
use App\Listeners\UserRegisterListener;
use App\Services\BrandService;
use App\Services\CategoryService;
use Illuminate\Auth\Events\Login;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        UserRegisterEvent::class => [
            UserRegisterListener::class
        ],
        UserLoggedIn::class => [
            CardTransferListener::class
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
        $brandService    = $this->app->make(BrandService::class);
        $brandsColumns   = $brandService->getAllActive();
        $categoryService = $this->app->make(CategoryService::class);

        $womanCategories = $categoryService->getBySlugName('kadin');
        $manCategories   = $categoryService->getBySlugName('erkek');
        $childCategories = $categoryService->getBySlugName('cocuk');

        view()->composer('front.*', function ($view)
        use (
            $brandsColumns,
            $womanCategories,
            $manCategories,
            $childCategories
        )
        {
            $view->with("brandsColumns", $brandsColumns)
                 ->with('womanCategories', $womanCategories->subCategoriesActive)
                 ->with('womanCategorySlug', $womanCategories->slug)
                 ->with('manCategories', $manCategories->subCategoriesActive)
                 ->with('manCategorySlug', $manCategories->slug)
                 ->with('childCategories', $childCategories->subCategoriesActive)
                 ->with('childCategorySlug', $childCategories->slug);

        });

        Event::listen(Login::class, function ($event){
            $oldSessionID = session()->getId();

            session()->regenerate();

            event(new UserLoggedIn($event->user, $oldSessionID));
        });
    }
}
