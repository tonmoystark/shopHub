<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\AccountController;
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

Route::middleware('auth')
    ->prefix('account')
    ->name('account.')
    ->controller(AccountController::class)
    ->group(function () {

        Route::get('/', 'dashboard')
            ->name('dashboard');

        Route::get('/orders', 'orders')
            ->name('orders.index');

        Route::get('/orders/{order}', 'showOrder')
            ->name('orders.show');

        Route::get('/profile', 'profile')
            ->name('profile');

        Route::patch('/profile', 'updateProfile')
            ->name('profile.update');

        Route::get('/password', 'password')
            ->name('password');
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

Route::prefix('checkout')
    ->name('checkout.')
    ->controller(CheckoutController::class)
    ->group(function () {

        Route::get('/', 'index')
            ->name('index');

        Route::post('/', 'store')
            ->name('store');

        Route::get('/success/{order}', 'success')
            ->name('success');
    });

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

        Route::resource('orders', OrderController::class)
            ->only([
                'index',
                'show',
            ]);

        Route::patch(
            'orders/{order}/status',
            [OrderController::class, 'updateStatus']
        )->name('orders.update-status');

        Route::patch(
            'orders/{order}/payment-status',
            [OrderController::class, 'updatePaymentStatus']
        )->name('orders.update-payment-status');
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
