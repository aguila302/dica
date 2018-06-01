<?php

namespace App\Http\Controllers;

use App\Autopista;

class ReportesController extends Controller
{
    /**
     * Muestra un listado de elementos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Autopista $autopista)
    {
        $levantamientos = $autopista->levantamientos;

        $view = \View::make('reporte.por-autopista', [
            'levantamientos' => $levantamientos,
            'autopista'      => $autopista,
        ])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream('invoice');
    }
}
