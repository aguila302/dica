@extends('layouts.app')
@section('content-header')
    <h1>
        Autopistas
        <a href="#" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nueva autopista</a>
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cadenamiento inicial</th>
                            <th>Cadenamiento final</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($autopistas as $autopista)
                        <tr>
                            <td>
                               <a href="#">
                                    {{ $autopista->nombre }}
                                </a>
                            </td>
                            <td>{{ $autopista->cadenamiento_inicial_km }} + {{ $autopista->cadenamiento_inicial_m }}</td>
                            <td>{{ $autopista->cadenamiento_final_km }} + {{ $autopista->cadenamiento_final_m }}</td>
                            <td>
                                <a href="{{ route('autopistas.edit', $autopista) }}">Editar</a>
                            </td>
                            <td>
                                <a class="#" href="#item-3-1">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
