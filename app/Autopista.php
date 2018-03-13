<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Autopista extends Model
{
    /**
     * Usuarios asignadas a esta autopista.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'autopista_user')->withTimestamps();
    }
}
