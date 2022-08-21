<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\AddToCartController;
use App\Http\Controllers\Admin\CartManagerController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/add-product', [ProductController::class, 'create'])->name('product.create');
    
});

Route::group(['namespace' => 'Customer', 'prefix' => 'customer'], function() {
    Route::get('/cart-added-products', [AddToCartController::class, 'index'])->name('cart.index');
});
