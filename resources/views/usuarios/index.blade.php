@extends('layouts.app')
@section('content-header')
    <h1>
        Usuarios
        @role('admin')
            <a href="{{ route('usuarios.create') }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nuevo usuario</a>
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
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>
                                {{ $usuario->name }}
                            </td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
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

