<?php

use App\Http\Controllers\Admin\AtributeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SubsubcategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user-list', [DashboardController::class, 'userlist'])->name('admin.userlist');

    Route::resource('/category', CategoryController::class);
    Route::resource('/sub-category', SubcategoryController::class);
    Route::resource('/sub-sub-category', SubsubcategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/atribute', AtributeController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/order-admin', OrderController::class);
    Route::resource('/setting', SettingController::class);


    Route::post('/get-subcategory', [ProductController::class, 'getsubcategory'])->name('get-subcategory');
    Route::post('/get-subsubcategory', [ProductController::class, 'getsubsubcategory'])->name('get-subsubcategory');
    Route::post('/attribute-values', [AtributeController::class, 'attributevalues'])->name('attribute-values');
    Route::post('/update-status', [OrderController::class, 'changestatus'])->name('update.status');
    Route::post('/order-status', [OrderController::class, 'orderstatus'])->name('order.status');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';