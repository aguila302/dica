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
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fa fa-btn fa-check-circle"> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Asignar autopistas a este usuario</h3>
                </div>

                <form class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}

                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <select name="ubicaciones[]" class="form-control selectpicker" multiple data-actions-box="true">
                            @foreach($autopistas as $autopista)
                                <option value="{{ $autopista->id }}">{{ $autopista->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Asignar autopistas</button>
                    </div>
                </form>
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
