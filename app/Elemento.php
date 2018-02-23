<?php

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
