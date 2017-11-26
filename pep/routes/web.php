<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('')->group(function() {
    Route::view('/','welcome');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::view('/selectLogin', 'auth.selectLogin');
    Route::view('/selectRegister','auth.selectRegister');
    //  GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm
    //  POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login
    //  POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout
    //  POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail
    //  GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm
    //  POST     | password/reset         |                  | App\Http\Controllers\Auth\ResetPasswordController@reset
    //  GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm
    //  GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm
    //  POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register
});

Route::prefix('aluno')->group(function() {
    Route::GET('/home', 'AlunoController@index');
    Route::GET('/', 'Aluno\LoginController@showLoginForm')->name('aluno.login');
    Route::POST('/','Aluno\LoginController@login');
    Route::POST('password/email','Aluno\ForgotPasswordController@sendResetLinkEmail')->name('aluno.password.email');
    Route::GET('password/reset','Aluno\ForgotPasswordController@showLinkRequestForm')->name('aluno.password.request');
    Route::POST('password/reset','Aluno\ResetPasswordController@reset');
    Route::GET('password/reset/{token}','Aluno\ResetPasswordController@showResetForm')->name('aluno.password.reset');
    Route::GET('register','Aluno\RegisterController@showRegistrationForm')->name('aluno.register');
    Route::POST('register','Aluno\RegisterController@register');
});

Route::prefix('instrutor')->group(function() {
    Route::GET('/home', 'InstrutorController@index');
    Route::GET('/', 'Instrutor\LoginController@showLoginForm')->name('instrutor.login');
    Route::POST('/','Instrutor\LoginController@login');
    Route::POST('password/email','Instrutor\ForgotPasswordController@sendResetLinkEmail')->name('instrutor.password.email');
    Route::GET('password/reset','Instrutor\ForgotPasswordController@showLinkRequestForm')->name('instrutor.password.request');
    Route::POST('password/reset','Instrutor\ResetPasswordController@reset');
    Route::GET('password/reset/{token}','Instrutor\ResetPasswordController@showResetForm')->name('instrutor.password.reset');
    Route::GET('register','Instrutor\RegisterController@showRegistrationForm')->name('instrutor.register');
    Route::POST('register','Instrutor\RegisterController@register');
});