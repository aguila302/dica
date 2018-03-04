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

// Route::resource('autopistas', 'AutopistaController');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('inicio', 'HomeController@index')->name('inicio');
    Route::get('autopistas', 'AutopistaController@index')->name('autopistas.index');
    Route::get('autopistas/registrar', 'AutopistaController@create')->name('autopistas.create')->middleware('role:admin');
    Route::post('autopistas', 'AutopistaController@store')->name('autopistas.store');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
