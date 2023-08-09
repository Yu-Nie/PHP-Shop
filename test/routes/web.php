<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/');
 });

Route::get('products',[ProductController::class,'index'])->name('products');

Route::get('cart', [CartController::class, 'show']);
Route::post('cart', [CartController::class,'addProduct'])->name('add_product');
Route::get('cart/{product_id}', [CartController::class, 'removeProduct'])->name('delete_product');
Route::delete('cart/{product_id}', [CartController::class, 'removeProduct'])->name('delete_product');

Route::post('checkout',[CheckoutController::class, 'checkout'])->name('checkout');
Route::post('placeorder',[CheckoutController::class, 'placeOrder'])->name('place_order');

Route::get('order',[OrderController::class,'show']);
Route::get('newOrder',[OrderController::class,'showNew']);