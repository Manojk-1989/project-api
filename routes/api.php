<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\AddToCartController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/products-with-images', [ProductController::class, 'index'])->name('product.index');

});


Route::group(['namespace' => 'Customer', 'prefix' => 'customer'], function() {
    Route::post('/add-to-cart', [AddToCartController::class, 'store'])->name('cart.store');
});
