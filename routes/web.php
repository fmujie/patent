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

Route::get('/search_view','\App\Http\Controllers\Patent\UserController@search_view');

Route::get('/pdfDld/{patentNum}','\App\Http\Controllers\Patent\UserController@pdfDld');

Route::post('/search_data','\App\Http\Controllers\Patent\UserController@search_data');

Route::post('/test','\App\Http\Controllers\Patent\UserController@test');


