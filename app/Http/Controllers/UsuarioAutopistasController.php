<?php

/**
 * Clase generada para agrupar solicitudes HTTP de usuarios y autopistas.
 * Autor: Alfonso Hernández Montoya.
 * Fecha de creación: 24 Mayo 2018.
 * Descripción: Clase para controlar las peticiones HTTP de un usuario y una autopista.
 * Modifico: Alfonso Hernández Montoya.
 * Fecha modificación: 24 Mayo 2018.
 */

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Http\Request;

class UsuarioAutopistasController extends Controller
{
    /**
     * Asigna autopista a un usuario.
     *
     * @param User      $user

     * @return Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, User $user)
    {
        /* Validamos las autopistas seleccionadas en el formulario. */
        $request->validate([
            'autopistas' => 'exists:autopistas,id',
        ], [
            'autopistas.exists' => 'La autopista no se encuentra en el catalogo',
        ]);

        /* Asignamos las autopistas a dicho usuario. */
        $user->asignaAutopista($request->autopistas);
        flash('La autopista se asigno exitosamente.')->important();

        return redirect()->route('usuarios.edit', [$user]);

    }

/**
 * Excluye una autopista al usuario.
 *
 * @param User      $user
 * @param Autopista $autopista
 *
 * @return Illuminate\Http\RedirectResponse
 */
    public function delete(User $user, Autopista $autopista)
    {
        /* Quitamos la autopista a dicho usuario. */
        $user->autopistas()->detach($autopista);
        flash('La autopista se quitó exitosamente.');
        return back();
    }
}
