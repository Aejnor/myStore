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


// Rutas de producto

Route::get('/productos/{productos}', 'ProductoController@show');

// Rutas de usuarios

Route::get('/user/{user}', 'UsersController@index')->name('users.username');

// Ruta Ajax de paginacion
Route::get('/giveproducts', 'PagesController@giveProducts');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/productos/create', 'ProductoController@create')->middleware('auth');
    Route::post('/productos/create', 'ProductoController@store')->middleware('auth');
    Route::get('/profile', 'UsersController@profile')->middleware('auth');

});

Route::get('/home', 'HomeController@index')->name('home');

