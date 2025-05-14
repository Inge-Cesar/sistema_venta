@extends('adminlte::page')

@section('content_header')
<h1><b>Detalles de la marca</b></h1>
<hr>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Detalles de la marca</h3>
                <a href="{{ route('admin.marcas.index') }}" class="btn btn-sm btn-secondary float-right">← Volver</a>
            </div>

            <div class="card-body row">
                {{-- Nombre --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre"><b>Nombre:</b></label>
                        <p>{{ $marca->nombre }}</p>
                    </div>
                </div>

                {{-- Descripción --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="descripcion"><b>Descripción:</b></label>
                        <p>{{ $marca->descripcion ? $marca->descripcion : 'Sin descripción' }}</p>
                    </div>
                </div>

                {{-- Logo --}}
                <div class="col-md-3">
                    <label for="logo"><b>Logo:</b></label>
                    @if ($marca->logo)
                        <center>
                            <img src="{{ asset('storage/' . $marca->logo) }}" width="70%" alt="Logo de la marca">
                        </center>
                    @else
                        <p>No se ha subido un logo</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
