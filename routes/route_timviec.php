<?php

// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
    Route::group(['prefix' => 'timviec', 'middleware' => 'auth'], function () {
        Route::get('/', 'Timviec\TimviecHomeController@home')->name('timviec.index');
        Route::resource('thongtintimviec','Timviec\ThongtinTimviecController');
        Route::resource('hosotimviec','Timviec\HosoTimviecController');
        Route::resource('cvtimviec','Timviec\TimviecCvController');
    });