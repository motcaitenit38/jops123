<?php

// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
Route::group(['prefix' => 'seeker', 'middleware' => 'auth'], function() {

    Route::get('','Seeker\Seeker_Home_Controller@index')->name('seeker.index');
    Route::resource('cv', 'Seeker\Seeker_cv_Controller');
    Route::post('save', 'HomeController@save_jops');
    Route::post('kiemtracv', 'HomeController@kiemtracv');
    Route::get('ungtuyen/{id}', 'HomeController@ungtuyen')->name('ungtuyen');
    Route::post('guicv', 'HomeController@guicv');

//    route quan ly cong viec
    route::get('da-ung-tuyen','Seeker\Seeker_jop_Controller@ungtuyen')->name('seeker.daungtuyen');
    route::get('da-luu','Seeker\Seeker_jop_Controller@daluu')->name('seeker.daluu');
//        route quản lý công việc liên quan
    Route::get('accordant', 'Seeker\Accordant_Jop_Controller@index')->name('seeker.lienquan');
    route::resource('info-seeker','Seeker\InfoController');

});