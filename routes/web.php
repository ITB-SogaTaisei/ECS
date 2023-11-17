<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class)->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    
    Route::prefix('{id}')->group(function () {
        Route::get('/', [ProductController::class, 'show']);
        
        Route::prefix('purchase')->group(function () {
            Route::get('/', [ProductController::class, 'purchase']);
            Route::get('/complete', [ProductController::class, 'complete'])->name('product.purchase.complete');
        });
    });
});