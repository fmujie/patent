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

Route::post('/search_data','\App\Http\Controllers\Patent\UserController@search_data');

Route::get('/pdfDld/{patentNum}','\App\Http\Controllers\Patent\UserController@pdfDld');

Route::get('/sundries/invite/{type}', 'Sundries\InviteController@inviteView');
Route::any('/sundries/invite/post', 'Sundries\InviteController@inviteData');

Route::get('/engpro/add_infor_view', 'EngPro\DataController@addInforView');
Route::post('/engpro/add_data', 'EngPro\DataController@addData');
Route::get('/engpro/show_info', 'EngPro\DataController@showInfor');

Route::get('/engpro/{page_address}', 'EngPro\DataController@showPage');

Route::get('/upload',  'TestController@test');
Route::post('/upload', 'TestController@uploadFile');
