<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\DashboardController;

Route::get('/', [FrontController::class, "index"]);

Route::get('/urun-listesi', [ProductController::class, "list"]);
Route::get('/urun-detay', [ProductController::class, "detail"]);

Route::get("/sepet", [CardController::class, 'card']);
Route::get("/odeme", [CheckoutController::class, 'index']);

Route::get("/siparislerim", [MyOrdersController::class, "index"]);
Route::get("/siparislerim-detay", [MyOrdersController::class, "detail"]);


Route::prefix("admin")->group(function (){

    Route::get("/", [DashboardController::class, 'index']);

});

//Route::get("/admin", [DashboardController::class, 'index']);

