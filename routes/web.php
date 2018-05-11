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
	Route::post('tuyendung/logout', 'Tuyendung\TuyendungLoginController@logout')->name('tuyendung.logout');

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
	    //
	    Route::get('/', 'Tuyendung\TuyendungController@index')->name('tuyendung.home');
	});
	

