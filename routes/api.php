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
        $data = \App\User::where('id', $id)->with(['cart' => function($query) {
            $query->with('products')->where('carts.status', 'ON CART');
        }])
        ->with('wishlist.products')->first();

        return $data;
    });

    Route::get('/cart-list', function() {
        return \App\Cart::with('products')->get();
    });

    Route::post('/logout', 'FrontAuthController@logout');

    Route::post('/cart', 'CartController@addCart');
    Route::post('/transaction', 'TransactionController@store');
    Route::post('/wishlist', 'WishlistController@add');
});

Route::post('/login', 'FrontAuthController@login');
Route::post('/register', 'FrontAuthController@register');


Route::get('/wishlist', 'WishlistController@index');
Route::get('/product-list', function() {
    return \App\Product::get();
});
