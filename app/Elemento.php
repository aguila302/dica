<?php

/**
 * Clase generada para el modelo App\Elemento.
 * Autor: Alfonso Hernández Montoya.
 * Fecha de creación: 24 Mayo 2018.
 * Descripción: Clase que representa el modelo App\Elemento.
 * Modifico: Alfonso Hernández Montoya.
 * Fecha modificación: 24 Mayo 2018.
 */

namespace App;

use App\SubElemento;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    /**
     * Sub elementos que pertenecen a este elemento.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subElementos()
    {
        return $this->hasMany(SubElemento::class);
    }
}
