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
    
    
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
        
        Route::resource('giving_users', 'Giving_usersController');
        
        Route::group(['prefix' => 'giving_users/{id}'],function() {
            Route::group(['prefix' => 'anniversaries/{anniversary}'],function() {
            Route::resource('presents', 'PresentsController');
            });            
            
            Route::resource('anniversaries', 'AnniversariesController');
            

            
        });
    });


    Route::get('/','UsersController@index');
