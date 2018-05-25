<?php

// Nhóm route dành cho người tìm việc (chỉ đăng nhập tìm việc mới truy cập được)
Route::group(['prefix' => 'seeker', 'middleware' => 'auth'], function() {
    Route::get('','Auth\HomeController@index');
    Route::resource('cv', 'Seeker\Seeker_cv_Controller');

});