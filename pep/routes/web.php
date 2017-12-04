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

Route::resource('treino', 'TreinoController');
Route::resource('atividade', 'AtividadeController');
Route::resource('grupoMuscular', 'GrupoMuscularController');
Route::resource('exercicio', 'ExercicioController');
    
Route::prefix('grupoMuscular')->group(function() {
    Route::GET('/create/{id}', 'GrupoMuscularController@create2');
});
    
Route::prefix('treino')->group(function() {
    Route::GET('/lista/{id}', 'TreinoController@lista');
    Route::POST('/salvar', 'TreinoController@salvar')->name('treino.salvar');
});

Route::prefix('atividade')->group(function() {
    Route::GET('/lista/{id}', 'AtividadeController@lista');
    Route::GET('/create/{id}', 'AtividadeController@createID');
});

Route::prefix('aluno')->group(function() {
    Route::GET('/home', 'AlunoController@index');
    Route::GET('/{id}/addinstrutor','AlunoController@selecionarInstrutor');
    Route::PUT('/registerInstrutor/{id}','AlunoController@updateInstrutor');
    Route::GET('/lista', 'AlunoController@show')->name('instrutor.lista');
    Route::GET('/{id}/edit', 'AlunoController@edit');
    Route::PUT('/{id}', 'AlunoController@update');
    Route::DELETE('/{id}', 'AlunoController@destroy');
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
    Route::GET('/alunos/{id}', 'InstrutorController@alunos');
    Route::GET('/{id}/treinos', 'InstrutorController@gerenciaTreinos');
    Route::GET('/lista', 'InstrutorController@show')->name('instrutor.lista');
    Route::GET('/{id}/edit', 'InstrutorController@edit');
    Route::PUT('/{id}', 'InstrutorController@update');
    Route::DELETE('/{id}', 'InstrutorController@destroy');
    Route::GET('/', 'Instrutor\LoginController@showLoginForm')->name('instrutor.login');
    Route::POST('/','Instrutor\LoginController@login');
    Route::POST('password/email','Instrutor\ForgotPasswordController@sendResetLinkEmail')->name('instrutor.password.email');
    Route::GET('password/reset','Instrutor\ForgotPasswordController@showLinkRequestForm')->name('instrutor.password.request');
    Route::POST('password/reset','Instrutor\ResetPasswordController@reset');
    Route::GET('password/reset/{token}','Instrutor\ResetPasswordController@showResetForm')->name('instrutor.password.reset');
    Route::GET('register','Instrutor\RegisterController@showRegistrationForm')->name('instrutor.register');
    Route::POST('register','Instrutor\RegisterController@register');
});

// Route::group(['prefix' => ''], function () {
//     Route::resource('users', 'UserController');
//     Route::resource('instrutors', 'InstrutorController');
//     // Route::resource('exercicio', 'ExercicioController')->middleware('auth');
//     Route::resource('exercicio', 'ExercicioController');
//     // Route::resource('instrutor', 'InstrutorController');
//     Route::resource('grupoMuscular', 'GrupoMuscularController');
// });