<?php

/**
 * Clase generada para el modelo App\SubElemento.
 * Autor: Alfonso Hernández Montoya.
 * Fecha de creación: 24 Mayo 2018.
 * Descripción: Clase que representa el modelo App\SubElemento.
 * Modifico: Alfonso Hernández Montoya.
 * Fecha modificación: 24 Mayo 2018.
 */

namespace App;

use App\Elemento;
use Illuminate\Database\Eloquent\Model;

class SubElemento extends Model
{
    /**
     * Elemento que pertenecen a estos sub elementos.
     */
    public function elemento()
    {
        return $this->belongsTo(Elemento::class);
    }
}
