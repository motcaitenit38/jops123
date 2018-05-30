<?php

Auth::routes();
//route register ajax thằng tìm việc
    Route::post('seeker/register','Employer\Employer_register_Controller@posRegister')->name('seeker.register.submit');
// regist
Route::get('employer/register', 'Employer\Employer_register_Controller@showRegistForm')->name('employer.register');
Route::post('employer/register','Employer\Employer_register_Controller@submitRegist')->name('employer.register.submit');
//login
Route::get('employer/login', 'Employer\Employer_login_Controller@showLoginForm')->name('employer.login');
Route::post('employer/login', 'Employer\Employer_login_Controller@submitLogin')->name('employer.login.submit');
// logout
Route::post('employer/logout', 'Employer\Employer_login_Controller@logout')->name('employer.logout');

//// login admin
//Route::get('admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
//Route::post('admin/login', 'Admin\AdminLoginController@submitLogin')->name('admin.login.submit');
//// regist
//Route::get('admin/register', 'Admin\AdminRegistController@showRegistForm')->name('admin.register');
//Route::post('admin/register', 'Admin\AdminRegistController@submitRegist')->name('admin.register.submit');
//Route::post('admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');
