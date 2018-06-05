<?php
    Route::group(['prefix' => 'tuyendung', 'middleware' => 'auth:employer'], function () {
        Route::get('/', 'Tuyendung\TuyendungHomeController@index')->name('tuyendung.index');
        Route::resource('info', 'Tuyendung\TuyendungThongtinController');
        // route quản lý công việc
        Route::resource('job', 'Tuyendung\TuyendungJobController');
        Route::get('job-hethan', 'Tuyendung\TuyendungJobController@jobhethan')->name('job.hethan');
        Route::get('jop-deadline', 'Employer\Employer_jop_Controller@expiration')->name('job.deadline');
//        Route::get('getnganh/nganh/{idlinhvuc}', 'Tuyendung\TuyendungJobController@getNganh');

// route quản lý thông tin công ty
//        Route::resource('info', 'Employer\Employer_info_Controller');
//        route quản lý ứng viên
        Route::get('qluv', 'Employer\Ql_ungvien_Controller@danhsachcongviec')->name('quanlyungvien');
        Route::get('danhsachungvien/{id}', 'Employer\Ql_ungvien_Controller@danhsachungvien');
    });