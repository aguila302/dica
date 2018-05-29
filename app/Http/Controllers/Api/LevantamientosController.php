<?php

namespace App\Http\Controllers\Api;

use App\Inventario;
use Illuminate\Http\Request;

class LevantamientosController extends ApiController
{

    /**
     * Registra un levantamiento en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Validamos la información. */
        $request->validate([
            'autopista_id'            => 'exists:autopistas,id|required',
            'elemento_id'             => 'exists:elementos,id|required',
            'subelemento_id'          => 'exists:sub_elementos,id|required',
            'cuerpo_id'               => 'exists:cuerpos,id|required',
            'condicion_id'            => 'exists:condicions,id|required',
            'carril_id'               => 'exists:carriles,id|required',
            'longitud_elemento'       => 'required',
            'cadenamiento_inicial_km' => 'required',
            'cadenamiento_inicial_m'  => 'required',
            'cadenamiento_final_km'   => 'required',
            'cadenamiento_final_m'    => 'required',
            'reportar'                => 'required|boolean',
            'estatus'                 => 'required',
            'uuid'                    => 'required',
        ]);

        /**
         * Verifica que un levantamiento solo se pueda sincronizar una sola vez, si el levantamiento ya se encuentra
         * sincronizado responde con un mensaje de error.
         */
        if (Inventario::where('uuid', $request->uuid)->exists()) {
            return $this->errorValidation('El levantamiento ya se encuentra sincronizado', 'levantamiento-sincronizado', '');
        }

        /* Registra el levantamiento en el origen de datos. */
        $levantamiento = Inventario::creaLevantamiento($request->all());

        return response()
            ->json([
                'id'         => $levantamiento->id,
                'created_at' => $levantamiento->created_at->toDateTimeString(),
            ], 201);
    }
}
