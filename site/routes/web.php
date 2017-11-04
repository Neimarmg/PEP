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

Route::get('/', function () {
    return view('teste');
    // return view('welcome');
});

Route::group(['prefix' => ''], function () {
    Route::resource('users', 'LearnController');
    // Route::resource('exercicio', 'ExercicioController')->middleware('auth');
    Route::resource('exercicio', 'ExercicioController');
    Route::resource('aurelio', 'ExercicioController');
    Route::resource('grupoMuscular', 'GrupoMuscularController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
