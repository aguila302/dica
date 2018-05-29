<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Inventario;
use Illuminate\Http\Request;

class FotografiasLevantamientos extends Controller
{

    /**
     * Carga y registra fotografias de un levantamiento.
     *
     * @param  \Illuminate\Http\Request  $request, Inventario $inventario
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inventario $inventario)
    {
        $request->validate([
            'foto' => 'required|image|mimes:png|max:2048',
        ]);

        // return $request->file('foto')->getClientOriginalName();
        $nombreImagen          = $request->file('foto')->getClientOriginalName();
        $pathDestinoFotografia = $request->file('foto')->storeAs('dicaFotos', $nombreImagen, 'public');

        /* Registra las fotografias del levantamiento.  */
        $fotografia = $inventario->fotografias()->create([
            'levantamiento_id' => $inventario->id,
            'fotografia'       => $pathDestinoFotografia,
        ]);
        return response()
            ->json([
                'id'         => $fotografia->id,
                'created_at' => $fotografia->created_at->toDateTimeString(),

            ]);
    }
}
