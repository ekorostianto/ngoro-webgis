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

Route::get('/', 'IndexController@index');
Route::get('/web', 'WebController@index');
Route::get('/map', function () {
    return view('map');
});

Route::get('/app', function () {
    return view('layouts/vue');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usaha', 'UsahaController@index');
Route::get('/usaha/tambah', 'UsahaController@tambah');
Route::post('/usaha/store', 'UsahaController@store');
Route::get('/usaha/edit/{id}', 'UsahaController@edit');
Route::put('/usaha/update/{id}', 'UsahaController@update');
Route::get('/usaha/delete/{id}', 'UsahaController@delete');

Route::get('/kegiatan', 'KegiatanController@index');
Route::get('/kegiatan/tambah', 'KegiatanController@tambah');
Route::post('/kegiatan/store', 'KegiatanController@store');
Route::get('/kegiatan/edit/{id}', 'KegiatanController@edit');
Route::put('/kegiatan/update/{id}', 'KegiatanController@update');
Route::get('/kegiatan/delete/{id}', 'KegiatanController@delete');

Route::get('/featuresUsaha', 'WebController@featuresUsaha');