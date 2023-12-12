<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;


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

Route::controller(UserController::class)->group(function() {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
    Route::put('users/mypage', 'update')->name('mypage.update');
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('users/mypage/password', 'change_password')->name('mypage.change_password');
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

//Route::get('/product/{id}', 'ProductController@show')->name('product.show');

Route::get('/cart', [CartController::class, 'show']);
Route::post('/product/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{productId}/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/cart/balk_purchase', [CartController::class, 'bulk_purchase']);
Route::get('/purchase/compete', [CartController::class, 'complete']);

//Route::get('/purchase/compete', [CartController::class, '']);