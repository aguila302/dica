@extends('layouts.app')
@section('content-header')
<h1>Usuarios
    @role('administrador')
        <a class="btn btn-success pull-right" href="{{ route('usuarios.create') }}"><i class="fa fa-plus"></i> Nuevo usuario</a>
    @endrole
</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a class="btn btn-link" href="{{ route('usuarios.edit', $user) }}">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('usuarios.delete', $user) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
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
