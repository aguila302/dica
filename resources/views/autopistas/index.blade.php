@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Autopistas</div>
                <div class="card-body">
                    <a href="{{ route('autopistas.create') }}" class="btn btn-primary pull-right">Nueva autopista</a>
                </div>
                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Autopista</th>
                                <th scope="col">Cadenamiento inicial</th>
                                <th scope="col">Cadenamiento final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($autopistas as $autopista)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="#">
                                            {{ $autopista->nombre }}
                                        </a>
                                    </td>
                                    <td>{{ $autopista->cadenamiento_inicial }}</td>
                                    <td>{{ $autopista->cadenamiento_final }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

