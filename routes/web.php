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
    Route::group(['middleware' => ['role:administrador|consulta|capturista']], function () {
        /* Rutas para autopistas. */
        Route::get('inicio', 'HomeController@index')->name('inicio');
        Route::get('autopistas', 'AutopistaController@index')->name('autopistas.index');
        Route::get('autopistas/registrar', 'AutopistaController@create')->name('autopistas.create');
        Route::post('autopistas', 'AutopistaController@store')->name('autopistas.store');
        Route::get('autopistas/{autopista}/modificar', 'AutopistaController@edit')->name('autopistas.edit');
        Route::patch('autopistas/{autopista}', 'AutopistaController@update')->name('autopistas.update');
        Route::delete('autopistas/{autopista}', 'AutopistaController@destroy')->name('autopistas.delete');

        /* Rutas para usuarios. */
        Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');
        Route::get('usuarios/registrar', 'UsuarioController@create')->name('usuarios.create');
        Route::post('usuarios', 'UsuarioController@store')->name('usuarios.store');
        Route::get('usuarios/{user}/modificar', 'UsuarioController@edit')->name('usuarios.edit');
        Route::delete('usuarios/{user}/eliminar', 'UsuarioController@destroy')->name('usuarios.delete');
        Route::patch('usuarios/{user}', 'UsuarioController@update')->name('usuarios.update');

        Route::post('usuarios/{user}/modificar', 'UsuarioAutopistasController@store')->name('usuario-autopista-store');

        Route::delete('usuarios/{user}/autopistas/{autopista}', 'UsuarioAutopistasController@delete')->name('usuario-autopista-delete');

        /* Rutas para elementos */
        Route::get('elementos', 'ElementoController@index')->name('elementos.index');
        Route::get('elementos/registrar', 'ElementoController@create')->name('elementos.create');
        Route::post('elementos', 'ElementoController@store')->name('elementos.store');
        Route::get('elementos/{elemento}/modificar', 'ElementoController@edit')->name('elementos.edit');
        Route::patch('elementos/{elemento}', 'ElementoController@update')->name('elementos.update');
        Route::delete('elementos/{elemento}/eliminar', 'ElementoController@destroy')->name('elementos.delete');

        /* Rutas para subelementos */
        Route::get('elementos/{elemento}/componentes', 'SubelementosController@index')->name('subelementos.index');
        Route::get('elementos/{elemento}/componente/registrar', 'SubelementosController@create')->name('subelementos.create');
        Route::post('elementos/{elemento}/componente', 'SubelementosController@store')->name('subelementos.store');

        /* Rutas subrecursos de levantamientos. */
        Route::prefix('autopista/{autopista}')->group(function () {
            Route::get('levantamientos', 'LevantamientosController@index')->name('levantamientos.index');
        });

    });

});
