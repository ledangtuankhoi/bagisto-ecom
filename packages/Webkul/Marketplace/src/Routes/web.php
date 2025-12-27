<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\SellerController;
use Webkul\Marketplace\Http\Controllers\ShopController;

Route::group(['middleware' => ['web', 'locale', 'theme', 'currency']], function () {

    // Marketplace Public Routes
    Route::get('/marketplace', [ShopController::class, 'index'])->name('marketplace.index');
    
    Route::get('/seller/{url}', [ShopController::class, 'view'])->name('marketplace.shop.view');

    // Registration Routes
    Route::middleware(['customer'])->group(function () {
        Route::get('/marketplace/register', [SellerController::class, 'create'])->name('marketplace.seller.create');
        Route::post('/marketplace/register', [SellerController::class, 'store'])->name('marketplace.seller.store');
    });

    // Seller Dashboard Routes
    Route::group(['middleware' => ['customer', \Webkul\Marketplace\Http\Middleware\CheckSeller::class], 'prefix' => 'marketplace/account'], function () {
        Route::get('/dashboard', [\Webkul\Marketplace\Http\Controllers\DashboardController::class, 'index'])->name('marketplace.account.dashboard');
        
        // Products
        Route::get('/products', [\Webkul\Marketplace\Http\Controllers\ProductController::class, 'index'])->name('marketplace.account.products.index');
        Route::get('/products/search', [\Webkul\Marketplace\Http\Controllers\ProductController::class, 'search'])->name('marketplace.account.products.search');
        Route::post('/products', [\Webkul\Marketplace\Http\Controllers\ProductController::class, 'store'])->name('marketplace.account.products.store');
        Route::get('/products/{id}/edit', [\Webkul\Marketplace\Http\Controllers\ProductController::class, 'edit'])->name('marketplace.account.products.edit');
        Route::put('/products/{id}', [\Webkul\Marketplace\Http\Controllers\ProductController::class, 'update'])->name('marketplace.account.products.update');
        Route::delete('/products/{id}', [\Webkul\Marketplace\Http\Controllers\ProductController::class, 'destroy'])->name('marketplace.account.products.delete');

        // Orders
        Route::get('/orders', [\Webkul\Marketplace\Http\Controllers\OrderController::class, 'index'])->name('marketplace.account.orders.index');
        Route::get('/orders/{id}', [\Webkul\Marketplace\Http\Controllers\OrderController::class, 'view'])->name('marketplace.account.orders.view');
    });

});
