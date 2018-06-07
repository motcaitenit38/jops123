<?php
    Route::group(['prefix' => 'tuyendung', 'middleware' => 'auth:employer'], function () {
        Route::get('/', 'Tuyendung\TuyendungJobController@index')->name('tuyendung.index');
        Route::resource('info', 'Tuyendung\TuyendungThongtinController');
        // route quản lý công việc
        Route::resource('job', 'Tuyendung\TuyendungJobController');
        Route::get('job-hethan', 'Tuyendung\TuyendungJobController@jobhethan')->name('job.hethan');
        Route::get('daxoa', 'Tuyendung\TuyendungJobController@daxoa')->name('job.daxoa');
        Route::get('xoajob/{id}','Tuyendung\TuyendungJobController@xoajob')->name('tuyendung.xoajob');
//        quanr lys ung vien
        Route::get('dangsachungvien/{id}', 'Tuyendung\DanhsachUngtuyenController@danhsach')->name('tuyendung.danhsachungtuyen');
        Route::get('chitietungvien/{idcv}/{idjob}', 'Tuyendung\DanhsachUngtuyenController@chitiethoso')->name('tuyendung.chitiethoso');
//        route chấp nhận ứng viên
        Route::post('chapnhan','Tuyendung\DanhsachUngtuyenController@chapnhanungvien')->name('tuyendung.chapnhanungvien');
        Route::post('tuchoi','Tuyendung\DanhsachUngtuyenController@tuchoi')->name('tuyendung.tuchoi');
        Route::post('luu-congty','Tuyendung\TuyendungLuuCongtyController@luucongty')->name('tuyendung.luucongty');
    });