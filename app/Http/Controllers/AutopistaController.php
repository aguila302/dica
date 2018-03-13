<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutopistaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra un listado de las autopistas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rol  = $user->hasRole('admin');
        if ($rol) {
            $autopistas = Autopista::latest()->paginate(10);
        } else {
            $autopistas = Autopista::with('usuarios')->paginate(5);
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
        $request->validate([
            'nombre'                  => 'required',
            'cadenamiento_inicial_km' => 'required|numeric|min:0|digits:3',
            'cadenamiento_inicial_m'  => 'required|numeric|min:0|digits:3',
            'cadenamiento_final_km'   => 'required|numeric|min:' . $request->cadenamiento_inicial_km . '|digits:3',
            'cadenamiento_final_m'    => 'required|numeric|min:0|digits:3',
        ]);

        $autopista                          = new Autopista;
        $autopista->nombre                  = $request->nombre;
        $autopista->cadenamiento_inicial_km = $request->cadenamiento_inicial_km;
        $autopista->cadenamiento_inicial_m  = $request->cadenamiento_inicial_m;
        $autopista->cadenamiento_final_km   = $request->cadenamiento_final_km;
        $autopista->cadenamiento_final_m    = $request->cadenamiento_final_m;
        $autopista->save();
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function edit(Autopista $autopista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autopista $autopista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autopista  $autopista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autopista $autopista)
    {
        //
    }
}
