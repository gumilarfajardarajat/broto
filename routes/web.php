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

Route::get('/menu','pemesananController@show');
Route::get('/pemesanan/menu','pemesananController@menu');
Route::get('/pemesanan/menu/appetizer','pemesananController@appetizer');
Route::get('/pemesanan/menu/makanan','pemesananController@makanan');
Route::get('/pemesanan/menu/minuman','pemesananController@minuman');
Route::get('/pemesanan/menu/dessert','pemesananController@dessert');