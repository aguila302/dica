@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header">Modificar autopista</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('autopistas.update', $autopista) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp"
                                placeholder="Nombre de la autopista" value="{{ $autopista->nombre }}">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Cadenamiento inicial</span>
                                </div>
                                <input type="text" class="form-control" name="cadenamiento_inicial_km" value="{{ $autopista->cadenamiento_inicial_km }}">
                                <span class="align-self-center" style="margin: 0 10px 0 10px;">+</span>
                                <input type="text" class="form-control" name="cadenamiento_inicial_m" value="{{ $autopista->cadenamiento_inicial_m }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Cadenamiento final</span>
                                </div>
                                <input type="text" class="form-control" name="cadenamiento_final_km" value="{{ $autopista->cadenamiento_final_km }}">
                                <span class="align-self-center" style="margin: 0 10px 0 10px;">+</span>
                                <input type="text" class="form-control" name="cadenamiento_final_m" value="{{ $autopista->cadenamiento_final_m }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
