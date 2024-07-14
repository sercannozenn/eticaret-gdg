<?php

namespace App\Providers;

use App\Models\Discounts;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::bind('product', function ($value)
        {
            return Product::query()
                          ->with(['productsMain', 'productsMain.category', 'productsMain.brand', 'variantImages', 'sizeStock'])
                          ->whereHas('sizeStock', function ($q)
                          {
                              $q->where('remaining_stock', '>', 0);
                          })
                          ->where('slug', $value)
                          ->firstOrFail();
        });
        Route::bind('discount', function ($value)
        {
            return Discounts::query()->where('id', $value)->firstOrFail();
        });

    }
}
