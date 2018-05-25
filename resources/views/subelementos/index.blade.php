@extends('layouts.app')
@section('content-header')
    <h1>
        Componentes del elemento {{ $elemento->descripcion }}
        @role('administrador')
            <a href="{{ route('subelementos.create', $elemento) }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nuevo componente</a>
        @endrole
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="example2" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($subelementos as $subelemento)
                        <tr>
                            <td>
                                {{ $subelemento->descripcion }}
                            </td>
                            <td>
                                {{-- <a class="btn btn-link" href="{{ route('elementos.edit', $elemento) }}">Editar</a> --}}
                            </td>
                            <td>
                                {{-- <form action="{{ route('elementos.delete', $elemento) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form> --}}
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
