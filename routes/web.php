<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/product/{id}', 'FrontEndController@productSingle')->name('product.single');

Route::post('/cart/add', 'ShoppingController@cartAdd')->name('cart.add');
Route::get('/cart/rapid/add/{id}', 'ShoppingController@cartRapidAdd')->name('cart.rapid.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{rowId}', 'ShoppingController@cartDelete')->name('cart.delete');
Route::get('/cart/incr/{rowId}/{qty}', 'ShoppingController@cartIncrement')->name('cart.increment');
Route::get('/cart/decr/{rowId}/{qty}', 'ShoppingController@cartDecrement')->name('cart.decrement');

Route::get('/cart/checkout', 'CheckoutController@cartCheckout')->name('cart.checkout');
Route::post('/cart/checkout', 'CheckoutController@cartPay')->name('cart.pay');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');
