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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rol  = $user->hasRole('admin');
        if ($rol) {
            $autopistas = Autopista::get()->sortByDesc('nombre');
        } else {
            $autopistas = $user->autopistas->sortByDesc('nombre');
        }
        return view('autopistas.index')->withAutopistas($autopistas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autopistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autopista                       = new Autopista;
        $autopista->nombre               = $request->nombre;
        $autopista->cadenamiento_inicial = $request->cadenamiento_inicial;
        $autopista->cadenamiento_final   = $request->cadenamiento_final;
        $autopista->save();
        return redirect()->route('autopistas.index');
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
