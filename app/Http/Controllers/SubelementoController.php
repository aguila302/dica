<?php

namespace App\Http\Controllers;

use App\Elemento;
use App\SubElemento;
use Illuminate\Http\Request;

class SubelementoController extends Controller
{

    /**
     * Muestra un listado de los componentes de un elemento.
     *
     * @param Elemento $elemento
     * @return \Illuminate\Http\Response
     */
    public function index(Elemento $elemento)
    {
        $subelementos = $elemento->subElementos()->orderBy('descripcion', 'ASC')->get();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
