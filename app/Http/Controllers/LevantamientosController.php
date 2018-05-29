<?php

/**
 * Clase generada para agrupar solicitudes HTTP de levantamientos.
 * Autor: Alfonso Hernández Montoya.
 * Fecha de creación: 24 Mayo 2018.
 * Descripción: Clase para controlar las peticiones HTTP de un levantamiento.
 * Modifico: Alfonso Hernández Montoya.
 * Fecha modificación: 24 Mayo 2018.
 */

namespace App\Http\Controllers;

use App\Autopista;
use App\Inventario;

class LevantamientosController extends Controller
{
    /**
     * Muestra un listado de levantamientos de una autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Autopista $autopista)
    {
        $levantamientos = $autopista->levantamientos;
        return view('levantamientos.index', [
            'levantamientos' => $levantamientos,
            'autopista'      => $autopista,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Autopista $autopista, Inventario $inventario)
    {
        $fotografias = $inventario->fotografias;

        return view('levantamientos.show', [
            'autopista'   => $autopista,
            'inventario'  => Inventario::findOrFail($inventario->id),
            'fotografias' => $fotografias,
        ]);
    }

}
