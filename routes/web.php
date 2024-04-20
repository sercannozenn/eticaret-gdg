<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\CardController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\MyOrdersController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, "index"])->name('index');

Route::get('/urun-listesi', [ProductController::class, "list"]);
Route::get('/urun-detay', [ProductController::class, "detail"]);

Route::get("/sepet", [CardController::class, 'card']);
Route::get("/odeme", [CheckoutController::class, 'index']);

Route::get("/siparislerim", [MyOrdersController::class, "index"]);
Route::get("/siparislerim-detay", [MyOrdersController::class, "detail"]);




Route::prefix("admin")->name('admin.')->middleware("auth")->group(function (){

    Route::get("/", [DashboardController::class, 'index'])->name("index");

//    Route::get("/", [DashboardController::class, 'index'])->name("report");
    Route::get("/order", [DashboardController::class, 'index'])->name("orders");


});

//Route::get("/admin", [DashboardController::class, 'index']);


/** Auth */
Route::prefix("kayit-ol")->middleware('throttle:registration')->group(function()
{
    Route::get("/", [RegisterController::class, 'showForm'])->name("register");
    Route::post("/", [RegisterController::class, 'register']);
});
Route::prefix('giris')->middleware('throttle:100,60')->group(function ()
{
    Route::get("/", [LoginController::class, 'showForm'])->name('login');
    Route::post("/", [LoginController::class, 'login']);
});
Route::post('logout', [LoginController::class, 'logout'])->name("logout");
Route::get('/dogrula/{token}', [RegisterController::class, 'verify'])->name("verify");
