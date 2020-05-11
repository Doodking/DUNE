<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/account', 'AccountController@getMyAccount')->middleware('auth');

Route::get('/account/subscr', 'AccountController@findSubscr')->middleware('auth');

Route::get('/account/subs', 'AccountController@findSubs')->middleware('auth');

Route::post('/account/avatar', 'AccountController@setAvatar')->middleware('auth')->name('setAvatar');

Route::get('/account/search', 'AccountController@get')->middleware('auth');

Route::post('/account/search', 'AccountController@post')->middleware('auth')->name('search');

Route::get('/account/user/{id}', 'AccountController@userget')->middleware('auth');

Route::post('/account/user/{id}', 'SubscriptionController@sub')->middleware('auth')->name('sub');
Route::post('/account/user/{id}/delete', 'SubscriptionController@unsub')->middleware('auth')->name('unsub');

Route::get('/account/chat', 'ChatController@index')->middleware('auth');

Route::get('account/friends', 'AccountController@friends')->middleware('auth');

//Route::get('/account/chat/create', 'ChatController@post')->middleware('auth')->name('sendMessage');
Route::get('/account/chat/create', 'ChatController@fetchMessages');
Route::post('/account/chat/create', 'ChatController@sendMessage');

Route::get('/support', function () {
    return view('support');
});

Route::post('/support/send', 'SupportController@send')->middleware('auth')->name('support');


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

Route::get('/buy/', 'CartController@get')->middleware('auth');

Route::post('/buy/cart', 'CartController@post')->middleware('auth')->name('buy');

Route::delete('/cart/{id}/delete', 'StoreController@delete')->middleware('auth')->name('deleteFromCart');

Route::get('/cart/{id}/delete', 'StoreController@delete')->middleware('auth');

Route::get('/cart/{id}/delete', 'StoreController@delete')->middleware('auth');

Route::get('/forum', 'PostController@get');

Route::post('/forum/post', 'PostController@post')->middleware('auth')->name('createTheme');

Route::get('/forum/post/{id}', 'PostController@getPost')->middleware('auth');

Route::post('/forum/post/{id}', 'LikeController@like')->middleware('auth')->name('like');
Route::post('/forum/post/{id}/unlike', 'LikeController@unlike')->middleware('auth')->name('unlike');
Route::post('/forum/post/{id}/delete', 'PostController@delete')->middleware('auth')->name('delete');
Route::post('/forum/post/{id}/report', 'PostController@report')->middleware('auth')->name('report');
Route::post('/forum/post/{id}/edit', 'PostController@edit')->middleware('auth')->name('edit');
Route::post('/forum/post/{id}/repost', 'RepostController@repost')->middleware('auth')->name('repost');

Route::post('/forum/post/{id}/createComment', 'CommentController@post')->middleware('auth')->name('createComment');

Route::post('/shop/{id}/product/{idOfProduct}', 'CommentController@postProduct')->middleware('auth')->name('createCommentProduct');


