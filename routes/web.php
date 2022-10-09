<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function(){

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('/products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        Route::resource('products', ProductController::class);

        Route::resource('users', UserController::class)->only([
            'index', 'destroy', 'edit', 'update'
        ]);
    });
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/hello', [HelloWorldController::class, 'show']);

Auth::routes(['verify' => true]);
