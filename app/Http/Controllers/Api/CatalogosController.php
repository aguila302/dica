<?php

namespace App\Http\Controllers\Api;

use App\Carril;
use App\Condicion;
use App\Cuerpo;
use App\Transformers\CarrilTransformer;
use App\Transformers\CondicionTransformer;
use App\Transformers\CuerpoTransformer;

class CatalogosController extends ApiController
{
    /**
     * Responde a un listado de cuerpos.

     * @return Illuminate\Http\Response
     */
    public function listCuerpos()
    {
        $cuerpo = Cuerpo::orderBy('descripcion', 'ASC')->get();
        return $this->respondWithCollection($cuerpo, new CuerpoTransformer);
    }

    /**
     * Responde a un listado de carriles.

     * @return Illuminate\Http\Response
     */
    public function listCarriles()
    {
        $carril = Carril::orderBy('descripcion', 'ASC')->get();
        return $this->respondWithCollection($carril, new CarrilTransformer);
    }

    /**
     * Responde a un listado de condiciones.

     * @return Illuminate\Http\Response
     */
    public function listCondiciones()
    {
        $condicion = Condicion::orderBy('descripcion', 'ASC')->get();
        return $this->respondWithCollection($condicion, new CondicionTransformer);
    }
}
