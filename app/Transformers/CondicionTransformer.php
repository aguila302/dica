<?php

namespace App\Transformers;

use App\Condicion;
use League\Fractal\TransformerAbstract as BaseTransformer;

class CondicionTransformer extends BaseTransformer
{

    /**
     * Transforma una condición en arreglo para representarlo en el api.
     *
     * @param  Condicion   $condicion
     * @return array
     */
    public function transform(Condicion $condicion)
    {
        return [
            'id'          => $condicion->id,
            'descripcion' => $condicion->descripcion,
        ];
    }
}
