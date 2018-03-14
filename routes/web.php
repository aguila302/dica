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
// Route::get('/', 'HomeController@index');
// Route::resource('autopistas', 'AutopistaController');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('inicio', 'HomeController@index')->name('inicio');
    Route::get('autopistas', 'AutopistaController@index')->name('autopistas.index');
    Route::get('autopistas/registrar', 'AutopistaController@create')->name('autopistas.create')->middleware('role:admin');
    Route::post('autopistas', 'AutopistaController@store')->name('autopistas.store')->middleware('role:admin');
    Route::get('autopistas/{autopista}/modificar', 'AutopistaController@edit')->name('autopistas.edit')->middleware('role:admin');
    Route::patch('autopistas/{autopista}', 'AutopistaController@update')->name('autopistas.update')->middleware('role:admin');
});
