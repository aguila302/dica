@extends('layouts.app')
@section('content-header')
    <h1>
        Levantamientos
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Elemento</th>
                            <th>Sub elemento</th>
                            <th>Cuerpo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levantamientos as $levantamiento)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $levantamiento->elemento->descripcion }}
                                </td>
                                <td>{{ $levantamiento->subelemento->descripcion }}</td>
                                <td>{{ $levantamiento->cuerpo->descripcion }}</td>
                                {{-- <td>{{ $autopista->cadenamiento_inicial_km }} + {{ $autopista->cadenamiento_inicial_m }}</td> --}}
                                {{-- <td>{{ $autopista->cadenamiento_final_km }} + {{ $autopista->cadenamiento_final_m }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
