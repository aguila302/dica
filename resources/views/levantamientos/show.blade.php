@extends('layouts.autopista')
@section('content-header')
    <h1>
        Detalle de levantamiento de la autopista {{ $inventario->autopista->nombre }}
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Información general</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Elemento:</label>
                        <p class="text-justify">{{ $inventario->elemento->descripcion }}</p>
                    </div>
                    <div class="form-group">
                        <label>Sub elemento:</label>
                        <p class="text-justify">{{ $inventario->subelemento->descripcion }}</p>
                    </div>
                    <div class="form-group">
                        <label>Cuerpo:</label>
                        <p class="text-justify">{{ $inventario->cuerpo->descripcion }}</p>
                    </div>
                    <div class="form-group">
                        <label>Condicion:</label>
                        <p class="text-justify">{{ $inventario->condicion->descripcion }}</p>
                    </div>
                    <div class="form-group">
                        <label>Condicion:</label>
                        <p class="text-justify">{{ $inventario->condicion->descripcion }}</p>
                    </div>
                    <div class="form-group">
                        <label>Carril:</label>
                        <p class="text-justify">{{ $inventario->carril->descripcion }}</p>
                    </div>
                    <div class="form-group">
                        <label>Longitud del elemento:</label>
                        <p class="text-justify">{{ $inventario->longitud_elemento }} mts.</p>
                    </div>
                    <div class="form-group">
                        <label>Cadenamiento inicial:</label>
                        <p class="text-justif">{{ $inventario->cadenamiento_inicial_km }} + {{ $inventario->cadenamiento_inicial_m }} </p>
                    </div>
                    <div class="form-group">
                        <label>Cadenamiento final:</label>
                        <p class="text-justif">{{ $inventario->cadenamiento_final_km }} + {{ $inventario->cadenamiento_final_m }} </p>
                    </div>
                    <div class="form-group">
                        <label>Observaciones:</label>
                        <p class="text-justif">{{ $inventario->observaciones }} </p>
                    </div>
                    <div class="form-group">
                        <label>Recomendaciones:</label>
                        <p class="text-justif">{{ $inventario->recomendaciones }} </p>
                    </div>
                    <div class="form-group">
                        <label>Estatus:</label>
                        @if($inventario->estatus === 0)
                            <p class="text-justif">Reporte inicial</p>
                        @elseif ($inventario->estatus === 1)
                            <p class="text-justif">En proceso de atención</p>
                        @else
                            <p class="text-justif">Reporte atendido</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Fotografias de este levantamiento</h3>
                </div>
                @foreach ($fotografias as $fotografia)
                <div class="col-sm-6 col-lg-6">
                    <img class="img-responsive pad" src="{{ asset('storage/'.$fotografia->fotografia) }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
