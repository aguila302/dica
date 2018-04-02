<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Muestra un listado de los usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::latest()->get();
        return view('usuarios.index')->withUsuarios($usuarios);
    }

    /**
     * Muestra un formulario para crear un usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Crea un usuario en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required',
            'email'    => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user           = new User;
        $user->name     = $request->nombre;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/usuarios');
    }

    /**
     * Muestra un formulario con los datos de un usuario para modificarla.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $autopistas          = Autopista::orderBy('nombre', 'ASC')->get();
        $autopistasAsignadas = $user->autopistas->sortBy('nombre');

        return view('usuarios.edit', [
            'user'                 => $user,
            'autopistas'           => $autopistas,
            'autopistas_asignadas' => $autopistasAsignadas,
        ]);
    }

    /**
     * Actualiza un usuario en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $auser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required',
            'email'  => 'required|email',
        ]);

        $user->name     = $request->nombre;
        $user->email    = $request->email;
        $user->password = str_random(10);
        $user->save();

        return redirect('/usuarios');
    }
}
