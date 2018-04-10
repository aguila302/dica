<?php

namespace App\Transformers;

use App\Cuerpo;
use League\Fractal\TransformerAbstract as BaseTransformer;

class CuerpoTransformer extends BaseTransformer
{

    /**
     * Transforma un cuerpo en arreglo para representarlo en el api.
     *
     * @param  Cuerpo   $cuerpo
     * @return array
     */
    public function transform(Cuerpo $cuerpo)
    {
        return [
            'id'          => $cuerpo->id,
            'descripcion' => $cuerpo->descripcion,
        ];
    }
}
