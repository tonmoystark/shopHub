<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::prefix('products')
    ->name('products.')
    ->controller(FrontendProductController::class)
    ->group(function () {

        Route::get('/', 'index')
            ->name('index');

        Route::get('/{product:slug}', 'show')
            ->name('show');
    });

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::prefix('cart')
    ->name('cart.')
    ->controller(CartController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::post('/{product}', 'store')->name('store');

        Route::patch('/{product}', 'update')->name('update');

        Route::delete('/{product}', 'destroy')->name('destroy');

        Route::delete('/', 'clear')->name('clear');
    });

/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/

// Route::prefix('checkout')
//     ->name('checkout.')
//     ->controller(CheckoutController::class)
//     ->group(function () {
//
//     });

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('products', ProductController::class);
        Route::delete(
            'products/images/{image}',
            [ProductController::class, 'destroyImage']
        )->name('products.images.destroy');
    });

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
