<?php

namespace App\Transformers;

use App\SubElemento;
use League\Fractal\TransformerAbstract as BaseTransformer;

class SubElementoTransformer extends BaseTransformer
{
    protected $defaultIncludes = ['elemento'];

    /**
     * Transforma un subelemento en arreglo para representarlo en el api.
     *
     * @param  Elemento   $elemento
     * @return array
     */
    public function transform(SubElemento $subelemento)
    {
        return [
            'id'          => $subelemento->id,
            'descripcion' => $subelemento->descripcion,
            'elemento'    => $subelemento->elemento,
        ];
    }

    protected function includeElemento(SubElemento $subelemento)
    {
        return $this->item($subelemento->elemento, new ElementoTransformer);
    }
}
