<?php

namespace App\Http\Controllers\Api;

use App\SubElemento;
use App\Transformers\SubElementoTransformer;
use Illuminate\Http\Request;

class SubElementosController extends ApiController
{
    /**
     * Responde a un listado de sub elementos.

     * @return Illuminate\Http\Response
     */
    function list(Request $request) {
        $subelemento = SubElemento::orderBy('descripcion', 'ASC')->get();
        return $this->respondWithCollection($subelemento, new SubElementoTransformer);
    }
}
