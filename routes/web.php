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
    /* Rutas para autopistas. */
    Route::get('inicio', 'HomeController@index')->name('inicio');
    Route::get('autopistas', 'AutopistaController@index')->name('autopistas.index');
    Route::get('autopistas/registrar', 'AutopistaController@create')->name('autopistas.create')->middleware('role:admin');
    Route::post('autopistas', 'AutopistaController@store')->name('autopistas.store')->middleware('role:admin');
    Route::get('autopistas/{autopista}/modificar', 'AutopistaController@edit')->name('autopistas.edit')->middleware('role:admin');
    Route::patch('autopistas/{autopista}', 'AutopistaController@update')->name('autopistas.update')->middleware('role:admin');
    Route::delete('autopistas/{autopista}', 'AutopistaController@destroy')->name('autopistas.delete')->middleware('role:admin');

    /* Rutas para usuarios. */
    Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index')->middleware('role:admin');
    Route::get('usuarios/registrar', 'UsuarioController@create')->name('usuarios.create')->middleware('role:admin');
    Route::post('usuarios', 'UsuarioController@store')->name('usuarios.store')->middleware('role:admin');
    Route::get('usuarios/{user}/modificar', 'UsuarioController@edit')->name('usuarios.edit')->middleware('role:admin');
    Route::delete('usuarios/{user}/eliminar', 'UsuarioController@destroy')->name('usuarios.delete')->middleware('role:admin');
    Route::patch('usuarios/{user}', 'UsuarioController@update')->name('usuarios.update')->middleware('role:admin');

    Route::post('usuarios/{user}/modificar', 'UsuarioAutopistasController@store')->name('usuario-autopista-store')->middleware('role:admin');

    Route::delete('usuarios/{user}/autopistas/{autopista}', 'UsuarioAutopistasController@delete')->name('usuario-autopista-delete')->middleware('role:admin');
});
