@extends('layouts.app')
@section('content-header')
    <h1 class="page-header"><a href="{{ route('elementos.index') }}">Elementos</a></h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo elemento</h3>
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
                <form method="POST" action="{{ route('elementos.store') }}" role="form">
                    @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Descripcion:</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="Nombre del elemento" value="{{ old('descripcion') }}">
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
