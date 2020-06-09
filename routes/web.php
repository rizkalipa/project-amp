<?php

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
Route::get('/tes', function () {
    $wishlist = \App\Wishlist::find(5);

    return !$wishlist ? 'true' : 'false';
});

Route::middleware('auth')->group(function() {
    Route::get('/office-site', "BacksiteController@index");
    Route::get('/office-site/register', "BacksiteController@register");
    Route::post('/office-site/logout', "Auth\LoginController@logout")->name('logout.auth');

    Route::get('/office-site/products', 'ProductController@index')->name('product.index');
    Route::get('/office-site/products/create', 'ProductController@create')->name('product.create');
    Route::post('/office-site/products/store', 'ProductController@store')->name('product.store');
    Route::get('/office-site/products/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/office-site/products/update', 'ProductController@update')->name('product.update');
    Route::post('/office-site/products/destroy', 'ProductController@destroy')->name('product.destroy');

    Route::get('/office-site/carts', 'CartController@index')->name('cart.index');
    Route::get('/office-site/wishlist', 'WishlistController@index')->name('wishlist.index');
    Route::get('/office-site/users', 'UserController@index')->name('user.index');
});
Route::get('/office-site/login', "BacksiteController@login")->name('login.backsite');
Route::post('/office-site/login', "Auth\LoginController@login")->name('login.auth');

Route::get('/{any}', 'HomeController@index')->where('any', '.*');

// Auth::routes();

