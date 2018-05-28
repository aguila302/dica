<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Inventario;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'inventario'  => $inventario,
            'fotografias' => $fotografias,
        ]);
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
