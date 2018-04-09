<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutopistaController extends Controller
{
    /**
     * Muestra un listado de las autopistas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rol  = $user->hasRole('admin');
        /* Mostramos todas las autopistas para el rol de administrador. */
        if ($rol) {
            $autopistas = Autopista::latest()->get();
        } else {
            /* Mostramos las autopistas asignadas de un usuario. */
            $autopistas = $user->autopistas;
        }
        return view('autopistas.index')->withAutopistas($autopistas);
    }

    /**
     * Muestra un formulario para crear una autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autopistas.create');
    }

    /**
     * Crea una autopista en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validamos los datos del formulario. */
        $request->validate($this->rules($request));

        /* Registramos la autopista en el origen de datos. */
        Autopista::createAutopista($request->all());

        flash('La autopista se registro exitosamente.')->important();
        return redirect('/autopistas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function show(Autopista $autopista)
    {
        //
    }

    /**
     * Muestra un formulario con los datos de una autopista para modificarla.
     *
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function edit(Autopista $autopista)
    {
        return view('autopistas.edit')->withAutopista($autopista);
    }

    /**
     * Actualiza una autopista en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autopista $autopista)
    {
        /* Validamos los datos del formulario. */
        $request->validate($this->rules($request));

        /* Actualizamos la autopista en el origen de datos. */
        $autopista->update($request->all());

        flash('La autopista se actualizo exitosamente.')->important();
        return redirect('/autopistas');
    }

    /**
     * Elimina una autopista en el origen de datos.
     *
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autopista $autopista)
    {
        /* Eliminamos una autopista del origen de datos. */
        $autopista->delete();
        flash('La autopista se elimino exitosamente.')->important();
        return back();
    }

    /**
     * Valida los datos del formulario.
     *
     * @param Request $request
     *
     */
    public function rules($request)
    {
        $rules = [
            'nombre'                  => 'required',
            'cadenamiento_inicial_km' => 'required|numeric|min:0|digits:3',
            'cadenamiento_inicial_m'  => 'required|numeric|min:0|digits:3',
            'cadenamiento_final_km'   => 'required|numeric|min:' . $request->cadenamiento_inicial_km . '|digits:3',
            'cadenamiento_final_m'    => 'required|numeric|min:0|digits:3',
        ];

        return $rules;
    }
}
