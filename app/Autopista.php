<?php

/**
 * Clase generada para el modelo App\Autopista.
 * Autor: Alfonso Hernández Montoya.
 * Fecha de creación: 24 Mayo 2018.
 * Descripción: Clase que representa el modelo App\Inventario.
 * Modifico: Alfonso Hernández Montoya.
 * Fecha modificación: 24 Mayo 2018.
 */

namespace App;

use App\Inventario;
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
     * Levantamientos que pertenecen a esta autopista.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levantamientos()
    {
        return $this->hasMany(Inventario::class);
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
