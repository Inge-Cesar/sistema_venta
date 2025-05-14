@extends('adminlte::page')

@section('content_header')
<h1><b>Editar Categoría</b></h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Formulario de Edición</h3>
                <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-arrow-left"></i> Volver</a>
            </div>

            <form action="{{ url('/admin/categorias', $categoria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre de la categoría <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}" required>
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
