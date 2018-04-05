@extends('layouts.app')
@section('content-header')
    <h1 class="page-header"><a href="{{ route('autopistas.index') }}">Autopistas</a></h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nueva autopista</h3>
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
                <form method="POST" action="{{ route('autopistas.store') }}" role="form">
                    @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre de la autopista" value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label>Cadenamiento inicial:</label>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" placeholder="Kilometros" class="form-control" name="cadenamiento_inicial_km" value="{{ old('cadenamiento_inicial_km') }}">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" placeholder="Metros" class="form-control" name="cadenamiento_inicial_m" value="{{ old('cadenamiento_inicial_m') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cadenamiento final:</label>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" placeholder="Kilometros" class="form-control" name="cadenamiento_final_km" value="{{ old('cadenamiento_final_km') }}">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" placeholder="Metros" class="form-control" name="cadenamiento_final_m" value="{{ old('cadenamiento_final_m') }}">
                                </div>
                            </div>
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
    </div>
</div>
@endsection
