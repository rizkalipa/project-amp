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

Route::middleware('auth')->group(function() {
    Route::get('/office-site', "BacksiteController@index");
    Route::get('/office-site/register', "BacksiteController@register");
    Route::post('/office-site/logout', "Auth\LoginController@logout")->name('logout.auth');
});
Route::get('/office-site/login', "BacksiteController@login")->name('login.backsite');
Route::post('/office-site/login', "Auth\LoginController@login")->name('login.auth');

Route::get('/{any}', 'HomeController@index')->where('any', '.*');

// Auth::routes();

