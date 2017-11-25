<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::GET('/home', 'AdminController@index');
    Route::GET('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::POST('/','Admin\LoginController@login');
    Route::POST('password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('password/reset','Admin\ResetPasswordController@reset');
    Route::GET('password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::prefix('aluno')->group(function() {
    Route::GET('/home', 'AlunoController@index');
    Route::GET('/test', 'AlunoController@test');
    // Route::GET('/', 'Aluno\LoginController@showLoginForm')->name('aluno.login');
    // Route::POST('/','Aluno\LoginController@login');
    // Route::POST('password/email','Aluno\ForgotPasswordController@sendResetLinkEmail')->name('aluno.password.email');
    // Route::GET('password/reset','Aluno\ForgotPasswordController@showLinkRequestForm')->name('aluno.password.request');
    // Route::POST('password/reset','Aluno\ResetPasswordController@reset');
    // Route::GET('password/reset/{token}','Aluno\ResetPasswordController@showResetForm')->name('aluno.password.reset');
});