@extends('layouts.app')
@section('content-header')
    {{-- <passport-clients-header></passport-clients-header> --}}
    <h1 class="page-header"><a href="{{ route('seguridad.index') }}">Clientes del API</a></h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <passport-clients></passport-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
@endsection

