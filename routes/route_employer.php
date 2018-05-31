<?php

// Nhóm route dành cho nhà tuyển dụng (Chỉ đăng nhập nhà tuyển dụng mới truy cập được)
    Route::group(['prefix' => 'employer', 'middleware' => 'auth:employer'], function () {
        // route quản lý người dùng tuyển dụng
        Route::get('/', 'Employer\Employer_home_Controller@index')->name('employer.index');

        // route quản lý công việc
        Route::resource('jop', 'Employer\Employer_jop_Controller');
        Route::get('jop-deadline', 'Employer\Employer_jop_Controller@expiration')->name('jop.deadline');

// route quản lý thông tin công ty
        Route::resource('info', 'Employer\Employer_info_Controller');
//        route quản lý ứng viên
        Route::get('qluv','Employer\Ql_ungvien_Controller@danhsachcongviec')->name('quanlyungvien');
        Route::get('danhsachungvien/{id}','Employer\Ql_ungvien_Controller@danhsachungvien');

    });