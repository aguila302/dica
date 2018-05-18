<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'Api\UsersController@user');
    Route::get('/autopistas', 'Api\AutopistasController@list');
    Route::get('/elementos', 'Api\ElementosController@list');
    Route::get('/subelementos', 'Api\SubElementosController@list');
    Route::get('/cuerpos', 'Api\CatalogosController@listCuerpos');
    Route::get('/carriles', 'Api\CatalogosController@listCarriles');
    Route::get('/condiciones', 'Api\CatalogosController@listCondiciones');

    /**
     * Ruta para registrar un levantamiento en el api.
     */
    Route::post('/levantamiento', 'Api\LevantamientosController@store');
});
