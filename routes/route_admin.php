<?php

// Nhóm route dành cho admin người quản trị hệ thống
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('', 'Admin\AdminController@index')->name('admin.home');

});