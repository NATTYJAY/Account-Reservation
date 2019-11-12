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

/*Login Route*/

Route::middleware(['accountSession', 'auth'])->group(function () { 
    Route::get('/', 'ReserveAccountController@index')->name('dashboard');
    Route::get('/refForm', 'ReserveAccountController@show')->name('showAccountForm');
    Route::get('/reserve', 'ReserveAccountController@reserveAccount')->name('reserveAccount');
    Route::post('/createdReserved', 'ReserveAccountController@create')->name('createReserved');
    // Route::post('/post', 'PostController@create');
    // Route::get('/post/{id}', 'PostController@read')->name('edit.post');
    // Route::put('/post/{id}', 'PostController@update')->name('update.post');
    // Route::delete('/post/{id}', 'PostController@delete')->name('destroy.post');
});


 Route::get('/test','ReserveAccountController@deleteSessionData');

Route::get('logout', 'LoginController@logout');
Route::get('login', array('uses' => 'LoginController@Login'));
Route::post('login','LoginController@doLogin')->name('login');


