@extends('layouts.autopista')

            <div class="box-header with-border small-box bg-yellow text-justify">
                <img src="{{ asset('images/image001.png') }}" alt="" width="140" style="height: auto; position: relative;">
                <br>
                <h4>Levantamientos carreteros de la autopista {{ $autopista->nombre }}</h4>
                <hr>
            </div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Elemento</th>
                            <th>Sub elemento</th>
                            <th>Cuerpo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levantamientos as $levantamiento)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $levantamiento->elemento->descripcion }}
                                </td>
                                <td>{{ $levantamiento->subelemento->descripcion }}</td>
                                <td>{{ $levantamiento->cuerpo->descripcion }}</td>
                                <td>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

