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



// login, register logout trang tuyen dung
	Route::get('tuyendung/login', 'Tuyendung\TuyendungLoginController@showLoginForm')->name('tuyendung.login');
	Route::post('tuyendung/login', 'Tuyendung\TuyendungLoginController@submitLogin')->name('tuyendung.login.submit'); 
	// regist
	Route::get('tuyendung/register', 'Tuyendung\TuyendungRegistController@showRegistForm')->name('tuyendung.register');
	Route::post('tuyendung/register', 'Tuyendung\TuyendungRegistController@submitRegist')->name('tuyendung.register.submit');
	// logout
	Route::post('tuyendung/logout', 'Tuyendung\TuyendungLoginController@logout')->name('tuyendung.logout');

	// login admin
	Route::get('admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('admin/login', 'Admin\AdminLoginController@submitLogin')->name('admin.login.submit'); 
	// regist
	Route::get('admin/register', 'Admin\AdminRegistController@showRegistForm')->name('admin.register');
	Route::post('admin/register', 'Admin\AdminRegistController@submitRegist')->name('admin.register.submit');
	Route::post('admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout'); 

	// Nhóm route dành cho mọi người dùng (Những trang không cần đăng nhập)
	Route::group(['prefix' => ''], function() {
	    //
	    Route::get('/', 'HomeController@index')->name('timviec.home');	    
	});

	// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
	Route::group(['prefix' => 'timviec', 'middleware' => 'auth'], function() {
	    //
	    Route::get('', 'Auth\HomeController@index')->name('timviec.home');

	});
	// Nhóm route dành cho nhà tuyển dụng (Chỉ đăng nhập nhà tuyển dụng mới truy cập được)
	Route::group(['prefix' => 'tuyendung', 'middleware'  => 'auth:tuyendung'], function() {
		// route quản lý người dùng tuyển dụng
		Route::resource('/', 'Tuyendung\UserTuyendungController');
	    // route quản lý thông tin người dùng tuyển dụng
	    Route::resource('info', 'Tuyendung\InfoTuyendungController');
	    // Route::get('/', 'Tuyendung\TuyendungController@index')->name('tuyendung.home');
	    // Route::get('danhsach', 'Tuyendung\TuyendunginfoController@getthongtin')->name('tuyendung.thongtin');

	    // Route::get('addinfo', 'Tuyendung\TuyendunginfoController@getAdd')->name('tuyendung.addinfo');
	    // Route::post('addinfo', 'Tuyendung\TuyendunginfoController@postAdd')->name('tuyendung.addinfo.submit');
	    
	});

	// Nhóm route dành cho admin người quản trị hệ thống
	Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	    //
	    Route::get('', 'Admin\AdminController@index')->name('admin.home');
	});
	

