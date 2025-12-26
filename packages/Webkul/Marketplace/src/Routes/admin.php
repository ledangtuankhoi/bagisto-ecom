<?php

use Illuminate\Support\Facades\Route;
use Webkul\Marketplace\Http\Controllers\Admin\SellerController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin/marketplace'], function () {

    Route::get('/sellers', [SellerController::class, 'index'])->name('admin.marketplace.sellers.index');
    Route::post('/sellers/update/{id}', [SellerController::class, 'update'])->name('admin.marketplace.sellers.update');

});
