<?php

namespace App\Http\Controllers\Api;

use App\Elemento;
use App\Transformers\ElementoTransformer;
use Illuminate\Http\Request;

class ElementosController extends ApiController
{
    /**
     * Responde a un listado de elementos.

     * @return Illuminate\Http\Response
     */
    function list(Request $request) {
        $elemento = Elemento::orderBy('descripcion', 'ASC')->get();
        return $this->respondWithCollection($elemento, new ElementoTransformer);
    }
}
