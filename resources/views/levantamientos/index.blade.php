@extends('layouts.autopista')
@section('content-header')
    <h1>
        Levantamientos de la autopista {{ $autopista->nombre }}
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
                            <th></th>
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
                                <td>
                                <a class="btn btn-link" href="{{ route('levantamiento.show', [$autopista, $levantamiento]) }}">Ver mas...</a>
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
