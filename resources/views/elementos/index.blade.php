@extends('layouts.app')
@section('content-header')
    <h1>
        Elementos
        @role('administrador')
            <a href="{{ route('elementos.create') }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nuevo elemento</a>
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
                            <th>#</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($elementos as $elemento)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $elemento->descripcion }}
                            </td>
                            <td>
                                <a class="btn btn-link" href="{{ route('subelementos.index', $elemento) }}">Ver mas</a>
                            </td>
                            <td>
                                <a class="btn btn-link" href="{{ route('elementos.edit', $elemento) }}">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('elementos.delete', $elemento) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $elementos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
