<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AutopistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autopistas = User::get();

        return view('autopistas.index')->withAutopistas($autopistas);
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
