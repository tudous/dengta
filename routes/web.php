<?php

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

Auth::routes();

Route::get('/home/{desk_id}', 'HomeController@index')->name('home');


Route::resource('products', 'ProductsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories','CategoriesController', ['only' => ['show']]);

Route::post('addcart', 'CartController@store')->name('addcart');
Route::get('tocart/{cart_id}', 'CartController@index');
Route::get('order_commit/{cart_id}', 'OrderController@toOrderCommit');
Route::get('clear/{id}', 'CartController@destroy');

Route::post('wxpay','PayController@wxpay');
Route::get('openid/get','PayController@getOpenid');
Route::post('pay/wx_notify', 'PayController@wxNotify');