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
include('route_employer.php');
include('route_seekers.php');
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@home');
    Route::get('kq', 'HomeController@search')->name('home.search');
    Route::get('cong-viec/{id}', 'HomeController@chitiet')->name('home.chitiet');
    Route::get('diachi/quanhuyen/{idthanhpho}', 'DiadiemController@getquanhuyen');
    Route::get('diachi/xaphuong/{idquanhuyen}', 'DiadiemController@getxaphuong');
});

