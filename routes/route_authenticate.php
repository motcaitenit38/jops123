<?php

    Auth::routes();
//route register ajax thằng tìm việc
    Route::post('seeker/register', 'Employer\Employer_register_Controller@posRegister')->name('seeker.register.submit');
// regist
    Route::get('tuyendung/register',
        'Tuyendung\TuyendungRegisterController@showRegistForm')->name('tuyendung.register');
    Route::post('tuyendung/register',
        'Tuyendung\TuyendungRegisterController@submitRegist')->name('tuyendung.register.submit');
//login
    Route::get('tuyendung/login', 'Tuyendung\TuyendungLoginController@showLoginForm')->name('tuyendung.login');
    Route::post('tuyendung/login', 'Tuyendung\TuyendungLoginController@submitLogin')->name('tuyendung.login.submit');
// logout
    Route::post('tuyendung/logout', 'Tuyendung\TuyendungLoginController@logout')->name('tuyendung.logout');

    //// login admin
    //Route::get('admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    //Route::post('admin/login', 'Admin\AdminLoginController@submitLogin')->name('admin.login.submit');
    //// regist
    //Route::get('admin/register', 'Admin\AdminRegistController@showRegistForm')->name('admin.register');
    //Route::post('admin/register', 'Admin\AdminRegistController@submitRegist')->name('admin.register.submit');
    //Route::post('admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');
