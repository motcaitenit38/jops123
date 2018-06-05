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
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@home')->name('trangchu.index');
    Route::get('kq', 'HomeController@search')->name('home.search');
    Route::get('jop/{id}', 'HomeController@detail')->name('home.detail');
});

