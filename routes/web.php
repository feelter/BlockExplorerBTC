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

//BTC Routes

Route::get('/', 'IndexController@index');
Route::get('/btc', 'IndexController@index');
Route::get('/btc/block/{id}', 'IndexController@blocks');
Route::get('/btc/address/{id}', 'IndexController@address');
Route::get('/btc/tx/{id}', 'IndexController@transaction');
Route::post('/search', 'IndexController@search');
Route::post('/error', 'IndexController@error');

//LTC Routes
Route::get('/ltc', 'LitecoinController@index');
Route::get('/ltc/block/{id}', 'LitecoinController@blocks');
Route::get('/ltc/address/{id}', 'LitecoinController@address');
Route::get('/ltc/tx/{id}', 'LitecoinController@transaction');
Route::post('/ltc/search', 'LitecoinController@search');
Route::post('/error', 'LitecoinController@error');

//Dash Routes
Route::get('/dash', 'DashController@index');
Route::get('/dash/block/{id}', 'DashController@blocks');
Route::get('/dash/address/{id}', 'DashController@address');
Route::get('/dash/tx/{id}', 'DashController@transaction');
Route::post('/dash/search', 'DashController@search');
Route::post('/error', 'DashController@error');

//ETH Routes
Route::get('/eth', 'EthController@index');
Route::post('/eth/search', 'EthController@search');
Route::get('/eth/address/{id}', 'EthController@address');
Route::get('/eth/tx/{id}', 'EthController@transaction');
Route::get('/eth/block/{id}', 'EthController@blocks');


//ETH Routes
Route::get('/bch', 'BCHController@index');
Route::post('/bch/search', 'BCHController@search');
Route::get('/bch/address/{id}', 'BCHController@address');
Route::get('/bch/tx/{id}', 'BCHController@transaction');
Route::get('/bch/block/{id}', 'BCHController@blocks');




