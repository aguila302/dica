<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Autopista extends Model
{
    protected $fillable = ['nombre', 'cadenamiento_inicial_km', 'cadenamiento_inicial_m', 'cadenamiento_final_km', 'cadenamiento_final_m'];
    /**
     * Usuarios asignadas a esta autopista.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'autopista_user')->withTimestamps();
    }

    /**
     * Crea una nueva autopista en el origen de datos.
     *
     * @param array $data
     *
     */
    public static function createAutopista($data)
    {
        $autopista = new static($data);
        $autopista->save();
    }
}
