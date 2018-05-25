<?php

namespace App\Http\Controllers\Api;

use App\Autopista;
use App\Transformers\AutopistaTransformer;
use Illuminate\Http\Request;

class AutopistasController extends ApiController
{
    /**
     * Responde a un listado de autopistas.

     * @return Illuminate\Http\Response
     */
    function list(Request $request) {
        $user = $request->user();
        $rol  = $user->hasRole('administrador');
        if ($rol) {
            $autopistas = Autopista::latest()->get();
        } else {
            $autopistas = $user->autopistas;
        }

        return $this->respondWithCollection($autopistas, new AutopistaTransformer);
    }
}
