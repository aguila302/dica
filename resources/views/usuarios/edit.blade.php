@extends('layouts.app')
@section('content-header')
    <h1 class="page-header"><a href="{{ route('usuarios.index') }}">Usuarios</a></h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Actualizar usuario</h3>
            </div>
            <div class="box-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('usuarios.update', $user) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label>Contraseña actual:</label>
                            <input type="password" name="password_actual" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña:</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Asignar autopistas a este usuario</h3>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ route('usuario-autopista-store', $user) }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <select name="autopistas" class="form-control selectpicker">
                                @foreach($autopistas as $autopista)
                                    <option value="{{ $autopista->id }}">{{ $autopista->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Asignar autopistas</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Autopistas asignadas a este usuario</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autopistas_asignadas as $autopista_asignada)
                            <tr>
                                <td>{{ $autopista_asignada->nombre }}</td>
                                <td>
                                    <form method="POST" action="{{ route('usuario-autopista-delete', [$user, $autopista_asignada]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-default">Quitar</button>
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
{{-- @section('scripts')
    <script>
        $('.selectpicker').selectpicker({
            noneSelectedText: 'Autopistas',
        });
    </script>
@endsection --}}
