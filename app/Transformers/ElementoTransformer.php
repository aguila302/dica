<?php

namespace App\Transformers;

use App\Elemento;
use League\Fractal\TransformerAbstract as BaseTransformer;

class ElementoTransformer extends BaseTransformer
{

    /**
     * Transforma un elemento en arreglo para representarlo en el api.
     *
     * @param  Elemento   $elemento
     * @return array
     */
    public function transform(Elemento $elemento)
    {
        return [
            'id'          => $elemento->id,
            'descripcion' => $elemento->descripcion,
        ];
    }
}
