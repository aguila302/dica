@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Nueva autopista</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('autopistas.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre de la autopista">
                        </div>
                        <div class="form-group">
                            <label for="cadenamiento.inicial">Cadenamiento inicial</label>
                            <input type="number" name="cadenamiento_inicial" class="form-control" id="cadenamiento.inicial" aria-describedby="nombreHelp" placeholder="Cadenamiento inicial">
                        </div>
                        <div class="form-group">
                            <label for="cadenamiento.final">Cadenamiento final</label>
                            <input type="number" name="cadenamiento_final" class="form-control" id="cadenamiento.final" aria-describedby="nombreHelp" placeholder="Cadenamiento final">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
