<?php

// Nhóm route dành cho admin người quản trị hệ thống
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('', 'Admin\AdminController@index')->name('admin.home');
    Route::get('list-user','Admin\ListUserController@listuser')->name('list-user');
    Route::get('list-employer','Admin\ListEmployerController@listuser')->name('list-employer');
    Route::get('list-job','Admin\ListJobController@listjob')->name('list-job');
});