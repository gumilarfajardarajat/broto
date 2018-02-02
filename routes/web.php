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



Route::get('/menu','pemesananController@index');

Route::get('/upload','adminController@form');
Route::post('/upload','adminController@upload');

Route::get('/admin/menu','adminController@indexMenu');
Route::get('/admin/menu/create','adminController@createMenu');
Route::post('/admin/menu','adminController@storeMenu');
Route::get('/admin/menu/{kode_menu}','adminController@editMenu');
Route::put('/admin/menu/{kode_menu}','adminController@updateMenu');
Route::delete('/admin/menu/{kode_menu}','adminController@destroyMenu');



Route::get('/pemesanan','pemesananController@createPelanggan');
Route::post('/pemesanan/home','pemesananController@storePelanggan');
Route::get('/pemesanan/home','pemesananController@home');
Route::get('/pemesanan/keluar','pemesananController@keluar');
Route::get('/pemesanan/menu/kirim','pemesananController@tampilCart');
Route::get('/pemesanan/menu/kirim/kosongkan','pemesananController@kirimCart');

Route::get('/pemesanan/menu','pemesananController@menu');
Route::get('/pemesanan/menu/{kategori}','pemesananController@kategori');
Route::get('/pemesanan/menu/show/{kode_menu}','pemesananController@show');
Route::post('/pemesanan/menu','pemesananController@addCart');
