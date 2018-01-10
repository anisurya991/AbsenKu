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
    return view('utama');
});
Route::post('/', 'AbsenController@delete');
Route::get('/deleteabsen', 'AbsenController@delete');

Route::get('absen', function () {
    return view('absen');
});
Route::post('absen', "AbsenController@PROSESGAN");

Route::get('hitungabsensi', 'AbsenController@gethitung');
Route::post('hitungabsensi', 'AbsenController@hitungabsensi');
