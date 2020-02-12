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

use App\Vegetable;

Route::get('/cart', 'CartsController@index');
Route::put('/cart/{cart}', 'CartsController@update');
Route::delete('/cart/{cart}', 'CartsController@delete');

Route::post('/cart/store', 'CartsController@store');
Route::get('/', 'VegetablesController@index');
Route::get('/{vegetable}', 'VegetablesController@show');