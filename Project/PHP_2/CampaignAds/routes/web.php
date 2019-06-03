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

Route::get('/','HomeController@index');
//{id_catalog?}
Route::get('/test','TestController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//account
Route::post('accounts/signup');
Route::post('accounts/signin');
Route::post('accounts/signout');

//product
Route::post('/product');
Route::get('/products');
Route::put('product/{id_product}');
Route::patch('product/{id_product}');
Route::delete('product/{id_product}');

//campaign
Route::post('/campaign');
Route::get('/products');
Route::put('campaign/{id_campaign}');
Route::patch('campaign/{id_campaign}');
Route::delete('campaign/{id_campaign}');
//report
Route::get('/reports');
Route::get('/report/{id_report}');