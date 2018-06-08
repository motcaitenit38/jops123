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
// include vao day tach rieng cho de nhin
include('route_authenticate.php');
//include('route_employer.php');
//include('route_seekers.php');
include ('route_timviec.php');
include('route_tuyendung.php');
include('route_admin.php');
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@home')->name('trangchu.index');
    Route::get('kq', 'HomeController@search')->name('home.search');
    Route::get('jop/{id}', 'HomeController@detail')->name('home.detail');
    Route::get('getnganh/nganh/{idlinhvuc}', 'HomeController@getNganh');
//    hiển thị thông tin công ty ứng viên quan tâm hồ sơ ứng tuyển
    Route::get('thong-tin-cong-ty/{iduser}/{idtuyendung}', 'HomeController@thongtintimviec')->name('index.thongtincongty');
//      hiển thị thông tin công ty nhà tuyển dụng quan tâm hồ sơ tìm việc
    Route::get('thong-tin-tuyen-dung/{idtuyendung}', 'HomeController@thongtintuyendung')->name('index.congtytuyendung');
//    Lấy tất cả danh sách nhà tuyển dung
    Route::get('danh-sach-nha-tuyen-dung','Tuyendung\DanhsachTuyendungController@danhsach')->name('tuyendung.danhsachtuyendung');

});



