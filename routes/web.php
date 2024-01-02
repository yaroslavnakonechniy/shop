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
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/basket/order', 'App\Http\Controllers\BasketController@basketOrder')->name('basket-order');
Route::post('/basket/confirm', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@addBasket')->name('addBasket');
Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@removeBasket')->name('removeBasket');


Route::get('/categories/{category}', 'App\Http\Controllers\MainController@category')->name('category');
//Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@show_product')->name('show_product');

Auth::routes();


