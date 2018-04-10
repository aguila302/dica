<?php

namespace App\Transformers;

use App\Autopista;
use League\Fractal\TransformerAbstract as BaseTransformer;

class AutopistaTransformer extends BaseTransformer
{

    /**
     * Transforma una autopista en arreglo para representarlo en el api.
     *
     * @param  Autopista   $autopista
     * @return array
     */
    public function transform(Autopista $autopista)
    {
        return [
            'id'                      => $autopista->id,
            'nombre'                  => $autopista->nombre,
            'cadenamiento_inicial_km' => $autopista->cadenamiento_inicial_km,
            'cadenamiento_inicial_m'  => $autopista->cadenamiento_inicial_m,
            'cadenamiento_final_km'   => $autopista->cadenamiento_final_km,
            'cadenamiento_final_m'    => $autopista->cadenamiento_final_m,
        ];
    }
}
