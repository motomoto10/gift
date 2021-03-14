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

// ユーザ登録
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
    
// 認証
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
// ゲストログイン
    Route::get('guest','Auth\LoginController@guestLogin')->name('login.guest');
    
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', 'UsersController');
        
        Route::group(['prefix' => 'user/{id}'],function() {
        Route::get('favorite_present','UsersController@favorite_present')->name('users.favorite_present');
        });
        Route::resource('gifts','GiftsController');
        
        Route::group(['prefix' => 'gifts/{id}'],function() {
            Route::post('favorite', 'GiftfavoriteController@store')->name('gifts.favorite');
            Route::delete('unfavorite', 'GiftfavoriteController@destroy')->name('gifts.unfavorite');
            Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
        });
        
        // プロフィール画像登録
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::post('/profile', 'ProfileController@store')->name('profile.store');
        
        
        
    });


Route::get('/', function () {
    return view('welcome');
});