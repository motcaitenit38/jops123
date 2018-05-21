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
	 Route::group(['prefix' => '/'], function() {
	 		
	     Route::get('/', 'HomeController@home');
	    
	     Route::get('diachi/quanhuyen/{idthanhpho}', 'DiadiemController@getquanhuyen');	    
	     Route::get('diachi/xaphuong/{idquanhuyen}', 'DiadiemController@getxaphuong');
	    	// trang kết quả tìm kiếm

	    	// Route::resource('timkiems', 'TimkiemController');
	});
	// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
	Route::group(['prefix' => 'timviec', 'middleware' => 'auth'], function() {
		Route::get('','Auth\HomeController@index');
	    Route::resource('info-timviec', 'Timviec\Timviec_infoController');

	});
	// Nhóm route dành cho nhà tuyển dụng (Chỉ đăng nhập nhà tuyển dụng mới truy cập được)
	Route::group(['prefix' => 'tuyendung', 'middleware'  => 'auth:tuyendung'], function() {
		// route quản lý người dùng tuyển dụng
		Route::get('/','Tuyendung\TuyendungController@home')->name('tuyendung.index');
	    // route quản lý thông tin người dùng tuyển dụng
	    Route::resource('info', 'Tuyendung\InfoTuyendungController');
	    // route quản lý dánh sách công việc
	    Route::resource('post', 'Tuyendung\Tuyendung_postController');
	    Route::get('trangthai', 'Tuyendung\Tuyendung_postController@trangthaicongviec')->name('post.trangthai');
	    
	});

	// Nhóm route dành cho admin người quản trị hệ thống
	Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	    Route::get('', 'Admin\AdminController@index')->name('admin.home');
	});
	

// include vao day tach rieng cho de nhin 
include('route_authenticate.php');