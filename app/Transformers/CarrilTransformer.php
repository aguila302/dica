<?php

namespace App\Transformers;

use App\Carril;
use League\Fractal\TransformerAbstract as BaseTransformer;

class CarrilTransformer extends BaseTransformer
{

    /**
     * Transforma un carril en arreglo para representarlo en el api.
     *
     * @param  Carril   $carril
     * @return array
     */
    public function transform(Carril $carril)
    {
        return [
            'id'          => $carril->id,
            'descripcion' => $carril->descripcion,
        ];
    }
}
