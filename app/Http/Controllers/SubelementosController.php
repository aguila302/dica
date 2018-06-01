<?php

/**
 * Clase generada para agrupar solicitudes HTTP de sub elementos.
 * Autor: Alfonso Hernández Montoya.
 * Fecha de creación: 24 Mayo 2018.
 * Descripción: Clase para controlar las peticiones HTTP de un sub elemento.
 * Modifico: Alfonso Hernández Montoya.
 * Fecha modificación: 24 Mayo 2018.
 */

namespace App\Http\Controllers;

use App\Elemento;
use App\SubElemento;
use Illuminate\Http\Request;

class SubelementosController extends Controller
{

    /**
     * Muestra un listado de los componentes de un elemento.
     *
     * @param Elemento $elemento
     * @return \Illuminate\Http\Response
     */
    public function index(Elemento $elemento)
    {
        $subelementos = $elemento->subElementos()->orderBy('descripcion', 'ASC')->paginate(10);
        return view('subelementos.index', [
            'subelementos' => $subelementos,
            'elemento'     => $elemento,
        ]);
    }

    /**
     * Muestra un formulario para registrar un componente de un elemento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Elemento $elemento)
    {
        return view('subelementos.create', [
            'elemento' => $elemento,
        ]);
    }

    /**
     * Registra un componente en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Elemento $elemento)
    {
        /* Validamos datos del formulario. */
        $request->validate([
            'descripcion' => 'required|string',
        ]);

        /* Registramos el componente en el origen de datos. */
        $subelemento              = new SubElemento;
        $subelemento->descripcion = $request->descripcion;
        $subelemento->elemento_id = $elemento->id;
        $subelemento->save();

        flash('El componenete se registro exitosamente.')->important();
        return redirect()->route('subelementos.index', $elemento);
    }
}
