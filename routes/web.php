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

Route::get('/', 'PageController@home');

Auth::routes();

Route::post('/register/validar', 'Auth/RegisterController@validacionAjax');

// Rutas que necesitan autorizacion.
Route::group(['middleware' => 'auth'], function () {
    Route::get('/productos/create', 'ProductoController@create');
    Route::post('/productos/validar', 'ProductoController@validacionAjax');
    Route::post('/productos/create', 'ProductoController@store');
    Route::get('/profile', 'UsersController@profile');
    Route::get('/profile/edit', 'UsersController@conf');
    Route::get('/profile/edit/account', 'UsersController@edit')->name('profile.account');
    Route::post('/profile/edit/account/validar', 'UsersController@validacionAjax');
    Route::patch('/profile/edit/account', 'UsersController@update');
    Route::get('/profile/edit/password', 'UsersController@edit')->name('profile.password');
    Route::patch('/profile/edit/password', 'UsersController@update');
    Route::get('/profile/edit/delete', 'UsersController@edit')->name('profile.delete');
    Route::delete('/profile/edit/delete', 'UsersController@destroy');
});

// Rutas de producto
Route::get('/productos/{productos}', 'ProductoController@show');

// Rutas de usuarios
Route::get('/user/{user}', 'UsersController@index')->name('users.username');

// Ruta Ajax de paginacion
Route::get('/giveproducts/', 'PageController@giveProducts');

Route::get('/home', 'HomeController@index')->name('home');

