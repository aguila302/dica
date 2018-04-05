<?php

namespace App\Http\Controllers;

use App\Elemento;
use Illuminate\Http\Request;

class ElementoController extends Controller
{
    /**
     * Muestra un listado de elementos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elementos = Elemento::latest()->get();
        return view('elementos.index')->withElementos($elementos);
    }

    /**
     * Muestra un formulario para registrar un elemento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elementos.create');
    }

    /**
     * Registra un elemento en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validamos datos del formulario. */
        $request->validate([
            'descripcion' => 'required|string',
        ]);

        /* Registramos el elemento en el origen de datos. */
        $elemento              = new Elemento;
        $elemento->descripcion = $request->descripcion;
        $elemento->save();

        flash('El elemento se registro exitosamente.')->important();
        return redirect('/elementos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Muestra un formulario pra actualizar un elemento.
     *
     * @param  Elemento $elemento
     * @return \Illuminate\Http\Response
     */
    public function edit(Elemento $elemento)
    {
        return view('elementos.edit')->withElemento($elemento);
    }

    /**
     * Actualiza los datos de un elemento en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Elemento $elemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elemento $elemento)
    {
        /* Validamos los datos del formulario. */
        $request->validate([
            'descripcion' => 'required|string',
        ]);

        /* Actualizamos los datos de un elemento en el origen de datos. */
        $elemento              = new Elemento;
        $elemento->descripcion = $request->descripcion;
        $elemento->save();

        flash('El elemento se actualizo exitosamente.')->important();
        return redirect('/elementos');
    }

    /**
     * Elimina un elemento del origen de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elemento $elemento)
    {
        /* Eliminamos un elemento del origen de datos. */
        $elemento->delete();
        flash('El elemento se elimino exitosamente.')->important();
        return back();
    }
}