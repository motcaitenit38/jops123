<?php

// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
Route::group(['prefix' => 'seeker', 'middleware' => 'auth'], function() {

    Route::get('','Seeker\Seeker_Home_Controller@index')->name('seeker.index');
    Route::resource('cv', 'Seeker\Seeker_cv_Controller');

});