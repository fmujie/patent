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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('usersT', 'UserTController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');


Route::group(['middleware' => ['auth', 'permission:View Patent']], function () {
    Route::get('/search_view','\App\Http\Controllers\Patent\UserController@search_view');
    Route::post('/search_data','\App\Http\Controllers\Patent\UserController@search_data');
    Route::get('/pdfDld/{patentNum}','\App\Http\Controllers\Patent\UserController@pdfDld');
});

Route::group(['middleware' => ['auth', 'role:Administer']], function () {
    Route::get('/sundries/invite/{type}', 'Sundries\InviteController@inviteView');
    Route::any('/sundries/invite/post', 'Sundries\InviteController@inviteData');
    // 导出纳新名单
    Route::get('/export/{grad}/{departmentId}', 'ExcelExport\RecruitController@export');
});

Route::prefix('engpro')->group(function () {
    Route::group(['middleware' => ['auth', 'permission:View EngPro']], function () {
        Route::get('/add_infor_view', 'EngPro\DataController@addInforView');
        Route::post('/add_data', 'EngPro\DataController@addData');
        Route::get('/show_info', 'EngPro\DataController@showInfor');
    });
});

Route::middleware(['auth', 'role:Administer', 'throttle:60,1'])->group(function () {
    Route::get('/engpro/{page_address}', 'EngPro\DataController@showPage'); 
});

// Route::get('/upload',  'TestController@test');
// Route::post('/upload', 'TestController@uploadFile');
// Route::get('/test', 'TestController@test')->middleware('role:EngProer|Administer');

Route::get('/test', 'TestController@test');

// Route::middleware()->group(function () {
    Route::get('/login/{thirdPart}', 'ThirdPart\LoginAuthController@thirdLogin');
    // Route::get('/auth/callback', 'ThirdPart\LoginAuthController@gitHubCallBack');
    // Route::get('/authqq/callback', 'ThirdPart\LoginAuthController@qqCallBack');
    // Route::get('/authweibo/callback', 'ThirdPart\LoginAuthController@weiboCallBack');
    Route::get('/{thirdPartAuth}/callback', 'ThirdPart\LoginAuthController@thirdPartCallBack');
// });

Route::prefix('recruit')->group(function () {
    Route::prefix('qus')->group(function () {
        Route::get('/desview', 'Recruit\QusDesController@index');
        Route::post('/dsplt', 'Recruit\QusDesController@dsTplt');
        Route::get('/viewgp', 'Recruit\QusDesController@viewGp');
        Route::get('/viewgp/info/{qusGpId?}', 'Recruit\QusDesController@viewOGpInfo');
        Route::patch('/update/gpsk/{qusId?}', 'Recruit\QusDesController@updateQus');
        Route::patch('/update/sel/{qusId?}', 'Recruit\QusDesController@updateQus');
        Route::post('/addqus/{qusGpId?}', 'Recruit\QusDesController@addQus');
        Route::get('/delete/{qusId?}', 'Recruit\QusDesController@deleteQus');
    });
    Route::prefix('exam')->group(function () {
        Route::get('/qusview', 'Recruit\ExamController@index');
    });
    Route::get('/login', 'Recruit\LogRegController@index');
    Route::get('/perinfor/{rUserId}', 'Recruit\PerInforController@index');
});

Route::get('/userPer', 'TestController@ceshiP')->middleware('auth');