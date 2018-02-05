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

Auth::routes();


Route::get('/', function(){
	return view('welcome');
});

Route::get('/home', 'pemesananController@createPelanggan')->name('home');

Route::get('/menu','pemesananController@index');



// Route::get('/admin/menu','adminController@indexMenu');
// Route::get('/admin/menu/create','adminController@createMenu');
// Route::post('/admin/menu','adminController@storeMenu');
// Route::get('/admin/menu/{kode_menu}','adminController@editMenu');
// Route::put('/admin/menu/{kode_menu}','adminController@updateMenu');
// Route::delete('/admin/menu/{kode_menu}','adminController@destroyMenu');



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


// Route::get('/koki','KokiController@index');
// Route::get('/koki/kirim/{antrian}','KokiController@kirim');
// Route::get('/koki/{antrian}/{jumlah}','KokiController@pengiriman');

// Route::get('/koki/resep/','KokiController@indexResep');
// Route::get('/koki/resep/show/{kode_menu}','KokiController@showBahan');
// Route::get('/koki/resep/add/{kode_menu}','KokiController@addBahan');
// Route::post('/koki/resep/{kode_menu}','KokiController@storeBahan');

Route::get('/pantry/menu','pantryController@indexMenu');
Route::get('/pantry/menu/create','pantryController@createMenu');
Route::post('/pantry/menu','pantryController@storeMenu');
Route::get('/pantry/menu/{kode_menu}','pantryController@editMenu');
Route::put('/pantry/menu/{kode_menu}','pantryController@updateMenu');
Route::delete('/pantry/menu/{kode_menu}','pantryController@destroyMenu');



Route::get('/pantry/pemesanan','PantryController@index');
Route::get('/pantry/pemesanan/kirim/{antrian}','PantryController@kirim');
Route::get('/pantry/pemesanan/{antrian}/{jumlah}','PantryController@pengiriman');

Route::get('/pantry/resep/','PantryController@indexResep');

Route::get('/pantry/resep/show/{kode_menu}','PantryController@showBahan');

Route::get('/pantry/resep/add/{kode_menu}','PantryController@addBahan');
Route::post('/pantry/resep/{kode_menu}','PantryController@storeBahanResep');
Route::delete('/pantry/resep/show/{kode_bahan}/{kode_menu}','PantryController@destroyResepBahan');


Route::get('/pantry/bahan','PantryController@indexBahan');
Route::get('/pantry/bahan/create','PantryController@createBahan');
Route::post('/pantry/bahan','PantryController@storeBahan');
Route::get('/pantry/bahan/{kode_bahan}','PantryController@editBahan');
Route::put('/pantry/bahan/{kode_bahan}','PantryController@updateBahan');
Route::delete('/pantry/bahan/{kode_bahan}','PantryController@destroyBahan');


Route::get('/kasir/pembayaran','KasirController@indexPembayaran');
Route::get('/kasir/pembayaran/{no_pelanggan}','KasirController@bayar');

Route::get('/kasir/pendapatan','KasirController@indexPendapatan');
Route::get('/kasir/kepuasan','KasirController@kepuasan');

