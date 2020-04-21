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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/support', function () {
    return view('support');
});

Route::get('/forum', function () {
    return view('forum');
});


Route::get('/shops', function () {
    return view('shops');
});

Route::get('/createashop', function () {
    return view('createashop');
});

Route::post('/createashop/create', 'MarketController@submit')->name('createashop');

Route::post('/posts/create', 'ShopController@submit')->name('forma');
