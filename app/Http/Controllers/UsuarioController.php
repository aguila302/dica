<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        /* Validamos los datos del formualrio.  */
        $request->validate([
            'nombre'   => 'required',
            'email'    => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        /*Registramos al usuario en el origen de datos. */
        $user           = new User;
        $user->name     = $request->nombre;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        flash('El usuario se registro exitosamente.')->important();
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
        /* Obtenemos el catalogo de autopistas. */
        $autopistas = Autopista::orderBy('nombre', 'ASC')->get();

        /* Obtenemos las autopistas asignadas a tal usuario. */
        $autopistasAsignadas = $user->autopistas->sortBy('nombre');

        $autopistasOrdenados = $autopistas->reject(function ($autopista) use ($autopistasAsignadas) {
            return $autopistasAsignadas->contains($autopista);
        });

        return view('usuarios.edit', [
            'user'                 => $user,
            'autopistas'           => $autopistasOrdenados,
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
        /* Validamos los datos del formualrio.  */
        $request->validate([
            'nombre'          => 'required',
            'email'           => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'username'        => 'required',
            'password_actual' => 'required|current_password',
            'password'        => 'required|string|confirmed',
        ]);

        /* Actualizamos al usuario en el origen de datos. */
        $user->name     = $request->nombre;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);

        $user->save();
        flash('El usuario se actualizo exitosamente.')->important();
        return redirect('/usuarios');
    }

    /**
     * Elimina un usuario del origen de datos.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('El usuario se elimino exitosamente.')->important();
        return back();
    }
}
