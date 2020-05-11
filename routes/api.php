<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
        $id = auth()->user()->id;

        return \App\User::where('id', $id)->with('carts.product')->first();
    });

    Route::get('/cart-list/{id}', function($id) {
        return \App\Cart::leftJoin('products', 'products.id', '=', 'carts.product_id')->get();;
    });

    Route::post('/logout', 'FrontAuthController@logout');

    Route::post('/cart', 'CartController@addCart');
});

Route::post('/login', 'FrontAuthController@login');
Route::post('/register', 'FrontAuthController@register');

Route::get('/product-list', function() {
    return \App\Product::get();
});
