<?php

namespace App\Http\Controllers;

class UsuarioAutopistasntroller extends Controller
{
    /**
     * Muestra un listado de los usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }
}
