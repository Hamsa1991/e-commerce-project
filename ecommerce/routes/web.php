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

Route::get('/','ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//products route
Route::post('/addToCart', 'ProductController@addToCart')->middleware('auth');
Route::post('/filterByName/{limit}/{page}', 'ProductController@filterByName');
Route::post('/filterByPrice/{limit}/{page}', 'ProductController@filterByPrice');
Route::get('/sortByPrice/{limit}/{page}', 'ProductController@sortByPrice');
Route::get('/sortByName/{limit}/{page}', 'ProductController@sortByName');
Route::get('/products/{limit?}', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');


//orders route
Route::get('/orders', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::post('/createOrder', 'OrderController@store');
Route::get('/shoppingCart', 'OrderController@create');
//Route::get('/successPayment/{$responseApi}', 'OrderController@successPayment');
Route::post('/checkout', 'OrderController@checkout');
