@extends('adminlte::page')

@section('content_header')
<h1><b>Detalle de Categoría</b></h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información de la Categoría</h3>
                <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>

            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID:</dt>
                    <dd class="col-sm-8">{{ $categoria->id }}</dd>

                    <dt class="col-sm-4">Nombre:</dt>
                    <dd class="col-sm-8">{{ $categoria->nombre }}</dd>

                    <dt class="col-sm-4">Descripción:</dt>
                    <dd class="col-sm-8">
                        {{ $categoria->descripcion ?: 'Sin descripción' }}
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@stop
