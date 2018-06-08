@extends('layouts.app')
@section('content-header')
    {{-- <passport-clients-header></passport-clients-header> --}}
    <h1 class="page-header"><a href="{{ route('seguridad.index') }}">Clientes del API</a></h1>
@endsection
@section('content')
    <passport-clients></passport-clients>
@endsection

