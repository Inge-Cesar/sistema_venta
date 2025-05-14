@extends('adminlte::page')

@section('content_header')
<h1><b>Crear Nueva Categoría</b></h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de Registro</h3>
                <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-arrow-left"></i> Volver</a>
            </div>

            <form action="{{ url('/admin/categorias') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre de la categoría <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Ingrese una descripción">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
