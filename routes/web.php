<?php

use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\CardController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\MyOrdersController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DiscountController;
use Illuminate\Support\Facades\Route;


/** Auth */
Route::prefix("kayit-ol")->middleware(['throttle:registration', 'guest'])->group(function()
{
    Route::get("/", [RegisterController::class, 'showForm'])->name("register");
    Route::post("/", [RegisterController::class, 'register']);
});
Route::prefix('giris')->middleware(['throttle:100,60', 'guest'])->group(function ()
{
    Route::get("/", [LoginController::class, 'showForm'])->name('login');
    Route::post("/", [LoginController::class, 'login']);
});
Route::post('logout', [LoginController::class, 'logout'])->name("logout");

Route::get('auth/{driver}/callback', [LoginController::class, 'socialiteVerify'])->name('login.socialite-verify');
Route::get('auth/{driver}', [LoginController::class, 'socialite'])->name('login.socialite');

Route::get('/dogrula/{token}', [RegisterController::class, 'verify'])->name("verify");
Route::get('/dogrula-mail', [RegisterController::class, 'sendVerifyMailShowForm'])->name('send-verify-mail');
Route::post('/dogrula-mail', [RegisterController::class, 'sendVerifyMail']);


Route::get('/', [FrontController::class, "index"])->name('index');


Route::get("/sepet", [CardController::class, 'card']);
Route::get("/odeme", [CheckoutController::class, 'index']);

Route::get("/siparislerim", [MyOrdersController::class, "index"])->name('order.index');
Route::get("/siparislerim-detay", [MyOrdersController::class, "detail"])->name('order.detail');

Route::get('front', [CategoryController::class, 'front']);


Route::prefix("admin")->name('admin.')->middleware(["auth", "admin.check"])->group(function (){

    Route::get("/", [DashboardController::class, 'index'])->name("index");
    Route::get("/order", [DashboardController::class, 'index'])->name("orders");

    Route::resource('category', CategoryController::class);
    Route::post('category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');

    Route::prefix('brand')->name('brand.')->group(function (){
       Route::get("/", [BrandController::class, 'index'])->name('index');
       Route::get("/create", [BrandController::class, 'create'])->name('create');
       Route::post("/create", [BrandController::class, 'store'])->name('store');
       Route::get("/edit/{brand}", [BrandController::class, 'edit'])->name('edit');
       Route::put("/edit/{brand}", [BrandController::class, 'update'])->name('update');
       Route::delete('/delete/{brand}', [BrandController::class, 'delete'])->name('destroy');

       Route::post('/change-status', [BrandController::class, 'changeStatus'])->name('change-status');
       Route::post('/change-is-featured', [BrandController::class, 'changeIsFeatured'])->name('change-is-featured');
    });

    Route::prefix('product')->name('product.')->group(function (){
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/create', [AdminProductController::class, 'store']);
        Route::get('/edit/{products_main}', [AdminProductController::class, 'edit'])->name('edit');
        Route::post('/edit/{products_main}', [AdminProductController::class, 'update']);
        Route::post('/check-slug', [AdminProductController::class, 'checkSlug'])->name('check-slug');
        Route::post('/change-status', [AdminProductController::class, 'changeStatus'])->name('change-status');
        Route::delete('/delete/{products_main}', [AdminProductController::class, 'delete'])->name('destroy');
        Route::get('/search', [AdminProductController::class, 'search'])->name('search');
    });

    Route::prefix('slider')->name('slider.')->group(function (){

        Route::get('/', [SlidersController::class, 'index'])->name('index');
        Route::get('/create', [SlidersController::class, 'create'])->name('create');
        Route::post('/create', [SlidersController::class, 'store']);
        Route::get('/edit/{slider}', [SlidersController::class, 'edit'])->name('edit');
        Route::put('/edit/{slider}', [SlidersController::class, 'update']);
        Route::post('/change-status', [SlidersController::class, 'changeStatus'])->name('change-status');
        Route::delete('/delete/{slider}', [SlidersController::class, 'delete'])->name('destroy');

    });

    Route::resource('discount', DiscountController::class);
    Route::prefix('discount')->name('discount.')->group(function (){
        Route::post('/change-status', [DiscountController::class, 'changeStatus'])->name('change-status');

        Route::get('/{discount}/assign-products', [DiscountController::class, 'showAssignProductsForm'])->name('assign-products');
        Route::post('/{discount}/assign-products', [DiscountController::class, 'assignProducts']);
        Route::get('/{discount}/products', [DiscountController::class, 'showProductsList'])->name('show-products-list');
        Route::delete('/{discount}/products/{product_remove}', [DiscountController::class, 'removeProduct'])->name('remove-product');

        Route::get('/{discount}/assign-categories', [DiscountController::class, 'showAssignCategoriesForm'])->name('assign-categories');
        Route::post('/{discount}/assign-categories', [DiscountController::class, 'assignCategories']);
        Route::get('/{discount}/assign-brands', [DiscountController::class, 'showAssignBrandsForm'])->name('assign-brands');
        Route::post('/{discount}/assign-brands', [DiscountController::class, 'assignBrands']);
        Route::get('/{discount}/categories', [DiscountController::class, 'showCategoriesList'])->name('show-categories-list');
        Route::get('/{discount}/brands', [DiscountController::class, 'showBrandsList'])->name('show-brands-list');
    });


    Route::group(['prefix' => 'gdg-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::get('/urun-listesi', [ProductController::class, "list"])->name('product.list');
Route::get('/{product:slug}', [ProductController::class, "detail"])->name('product.detail');


