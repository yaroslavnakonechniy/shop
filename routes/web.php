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

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::group(['middleware' => 'is_admin'], function(){
        Route::get('/orders', 'App\Http\Controllers\Admin\Order\IndexController@index')->name('home');
    });

    Route::resource('categories', 'App\Http\Controllers\Admin\Category\CategoriesController');
    Route::resource('products', 'App\Http\Controllers\Admin\Product\ProductController');
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');

Route::group(['prefix' => 'basket'], function(){

    Route::post('/add/{id}', 'App\Http\Controllers\BasketController@addBasket')->name('addBasket');

    Route::group(['middleware' => 'basket_not_empty'], function(){

        Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
        Route::get('/order', 'App\Http\Controllers\BasketController@basketOrder')->name('basket-order');
        Route::post('/confirm', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
        Route::post('/remove/{id}', 'App\Http\Controllers\BasketController@removeBasket')->name('removeBasket');
    });
});

Route::get('/categories/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@show_product')->name('show_product');

Auth::routes();




