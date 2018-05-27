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
    route::get('ung-tuyen','Seeker\Seeker_jop_Controller@ungtuyen');

});