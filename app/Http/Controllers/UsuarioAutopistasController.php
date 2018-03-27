<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;

class UsuarioAutopistasController extends Controller
{
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
        $user->autopistas()->detach($autopista);
        flash('La ubicación se quitó exitosamente.');
        return back();
    }
}
