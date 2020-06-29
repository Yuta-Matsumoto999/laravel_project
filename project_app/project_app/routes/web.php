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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('sale.index');
});

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('auth/login/twitter', 'Auth\SocialController@getTwitterAuth');
Route::get('auth/login/callback/twitter', 'Auth\SocialController@getTwitterAuthCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sale', 'SaleController@index')->name('sale.index');
Route::get('/sale/contact', 'SaleController@showContact')->name('sale.show.contact');
Route::get('/sale/cart', 'SaleController@showCart')->name('sale.show.cart');
Route::get('/sale/cart/product/{id}', 'SaleController@showCartProduct')->name('sale.show.cart.product');
Route::get('/sale/product/{id}', 'SaleController@showProduct')->name('sale.show.product');
Route::get('/sale/cart/purchase', 'SaleController@showCartPurchase')->name('sale.show.cart.purchase');
Route::post('/sale/product/cart/{id}', 'SaleController@storeCart')->name('sale.store.cart');
Route::post('/sale/contact', 'SaleController@storeContact')->name('sale.store.contact');
Route::post('/sale/purchase/cart', 'SaleController@storeCartPurchase')->name('sale.store.cart.purchase');
Route::put('/sale/cart/{id}', 'SaleController@updateCart')->name('sale.update.cart');
Route::delete('/sale/cart/destroy/{id}', 'SaleController@destroyByCart')->name('sale.destroy.cart');


