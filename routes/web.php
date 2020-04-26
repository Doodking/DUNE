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
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/account', function () {
    return view('account');
})->middleware('auth');

Route::get('/support', function () {
    return view('support');
});

Route::get('/forum', function () {
    return view('forum');
})->middleware('auth');


Route::get('/shops', 'CamelMarketController@get')->middleware('auth');

Route::get('/shopsofuser/shopsofuser/{id}/shop/{idofshop}', 'StoreController@get')->middleware('auth');

Route::get('/createashop', function () {
    return view('createashop');
})->middleware('auth');

Route::post('/createashop/create', 'MarketController@submit')->name('createashop')->middleware('auth');

Route::post('/posts/create', 'ShopController@submit')->name('forma')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shopsofuser/shopsofuser/{id}/shop/{idofshop}/create', 'StoreController@create')->middleware('auth');

Route::post('/shop/{idofshop}/create/done', 'StoreController@post')->name('createaproduct')->middleware('auth');

Route::get('/shop/{id}/product/{idofproduct}', 'StoreController@productGet')->middleware('auth');

Route::get('/shopsofuser/{id}', 'MarketController@get')->middleware('auth');

Route::get('/new', function () {
    return view('layouts.app');
})->middleware('auth');

Route::get('/cart/{id}', 'StoreController@getBuy')->middleware('auth');

Route::post('/product/{id}/buy/add', 'StoreController@addToCart')->middleware('auth')->name('addToCart');

Route::get('/buy/', 'StoreController@buy')->middleware('auth');
