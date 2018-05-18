<?php

namespace App\Http\Controllers\Api;

use App\Inventario;
use Illuminate\Http\Request;

class LevantamientosController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            return $this->errorValidation('El inventario ya se encuentra sincronizado', 'levantamiento-sincronizado', '');
        }

        /* Registramos el levantamiento en el origen de datos. */
        $levantamiento = Inventario::creaLevantamiento($request->all());
        return response()
            ->json([
                'id'         => $levantamiento->id,
                'created_at' => $levantamiento->created_at->toDateTimeString(),
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
