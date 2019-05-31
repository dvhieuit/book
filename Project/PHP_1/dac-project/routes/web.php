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

Route::get('/test', function () {
    return view('test');
});

Route::get('/activate', 'Auth\RegisterController@updateStatus');

Route::get('/user', 'UserController@index')->name('user');

Route::post('/user/delete', 'UserController@deleteUser')->name('user.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
