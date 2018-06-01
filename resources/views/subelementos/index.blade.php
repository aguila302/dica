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
                            <th>#</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($subelementos as $subelemento)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $subelemento->descripcion }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $subelementos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
