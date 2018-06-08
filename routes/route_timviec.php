<?php

// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
    Route::group(['prefix' => 'timviec', 'middleware' => 'auth'], function () {
        Route::get('/', 'Timviec\TimviecQuanlyCongviecController@dangungtuyen')->name('timviec.index');
        Route::resource('thongtintimviec','Timviec\ThongtinTimviecController');
        Route::resource('cvtimviec','Timviec\TimviecCvController');
        Route::post('kiemtracv', 'Timviec\TimviecHomeController@kiemtracv');
        Route::get('ungtuyen/{id}', 'Timviec\TimviecHomeController@ungtuyen')->name('timviec.ungtuyen');
        Route::post('guicv', 'Timviec\TimviecHomeController@guicv')->name('truongdz');
        Route::post('save', 'Timviec\TimviecHomeController@save_jops')->name('timviec.luucongviec');
//        route quản lý cong viec da ung tuyen
        Route::get('dangungtuyen','Timviec\TimviecQuanlyCongviecController@dangungtuyen')->name('timviec.dangungtuyen');
        Route::get('daluu','Timviec\TimviecQuanlyCongviecController@daluu')->name('timviec.daluu');
        Route::get('trungtuyen','Timviec\TimviecQuanlyCongviecController@trungtuyen')->name('timviec.trungtuyen');
        Route::get('khongtrungtuyen','Timviec\TimviecQuanlyCongviecController@khongtrungtuyen')->name('timviec.khongtrungtuyen');
//        tìm kiếm nhà tuyển dụng
        Route::get('tim-kiem-nha-tuyen-dung','Timviec\TimKiemNhaTuyenDungController@formtimkiem')->name('form.timiem.nhatuyendung');
        Route::get('kqtk','Timviec\TimKiemNhaTuyenDungController@timkiem')->name('timiem.nhatuyendung');
    });