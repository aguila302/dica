<?php

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
