@extends('layouts.app')
@section('content-header')
    <h1 class="page-header"><a href="{{ route('subelementos.index', $elemento) }}">Componentes del elemento {{ $elemento->descripcion }}</a></h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo componente</h3>
            </div>

            <div class="box-body">
                @include('messages.message')
                <form method="POST" action="{{ route('subelementos.store', $elemento) }}" role="form">
                    @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Descripcion:</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="Nombre del componente" value="{{ old('descripcion') }}">
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
