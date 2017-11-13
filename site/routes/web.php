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
    return view('welcome');
});

Route::get('/selectLogin', function () {
    return view('auth.selectLogin');
});

Route::get('/selectRegister', function () {
    return view('auth.selectRegister');
});

Route::get('/formtreino', function () {
    return view('treino.formulario');
});

Route::get('/instrutor/register', function () {
    return view('users.instrutor.create');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => ''], function () {
    Route::resource('users', 'UserController');
    Route::resource('instrutors', 'InstrutorController');
    // Route::resource('exercicio', 'ExercicioController')->middleware('auth');
    Route::resource('exercicio', 'ExercicioController');
    Route::resource('aurelio', 'ExercicioController');
    Route::resource('grupoMuscular', 'GrupoMuscularController');
});
Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('instrutor')->group(function() {
    Route::get('/login', 'Auth\InstrutorLoginController@showLoginForm')->name('instrutor.login');
    Route::post('/login', 'Auth\InstrutorLoginController@login')->name('instrutor.login.submit');
    Route::get('/', 'InstrutorController@index')->name('instrutor.dashboard');
    Route::get('/logout', 'Auth\InstrutorLoginController@logout')->name('instrutor.logout');
});

// Route::prefix('treino')->group(function() {
//     Route::get('/login', 'Auth\TreinoLoginController@showLoginForm')->name('treino.login');
//     Route::post('/login', 'Auth\TreinoLoginController@login')->name('treino.login.submit');
//     Route::get('/', 'TreinoController@index')->name('treino.dashboard');
//     Route::get('/logout', 'Auth\TreinoLoginController@logout')->name('treino.logout');
// });