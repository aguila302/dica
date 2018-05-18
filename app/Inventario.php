<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $casts = [
        'reportar' => 'boolean',
    ];

    protected $fillable = ['autopista_id', 'elemento_id', 'subelemento_id', 'cuerpo_id', 'condicion_id', 'carril_id', 'longitud_elemento', 'cadenamiento_inicial_km', 'cadenamiento_inicial_m', 'cadenamiento_final_km', 'cadenamiento_final_m', 'reportar', 'estatus', 'uuid'];

    /**
     * Crea una nuevo levantamiento en el origen de datos.
     *
     * @param array $data
     *
     */
    public static function creaLevantamiento($data)
    {
        $levantamiento = new static($data);
        $levantamiento->save();
        return $levantamiento;
    }
}
