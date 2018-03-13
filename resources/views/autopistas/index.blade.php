@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light mb-3">
                <div class="card-header">Autopistas</div>
                <div class="card-body">
                    @role('admin')
                        <a href="{{ route('autopistas.create') }}" class="btn btn-primary pull-right">Nueva autopista</a>
                    @endrole
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead class="p-3 mb-2 bg-light text-dark">
                            <tr>
                                <th>#</th>
                                <th>Autopista</th>
                                <th>Cadenamiento inicial</th>
                                <th>Cadenamiento final</th>
                                <th></th>
                                <th></th>
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
                                    <td>{{ $autopista->cadenamiento_inicial_km }} + {{ $autopista->cadenamiento_inicial_m }}</td>
                                    <td>{{ $autopista->cadenamiento_final_km }} + {{ $autopista->cadenamiento_final_m }}</td>
                                    <td>
                                        <a class="#" href="#item-3-1">Editar</a>
                                    </td>
                                    <td>
                                        <a class="#" href="#item-3-1">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    {{ $autopistas->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

