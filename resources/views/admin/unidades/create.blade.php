@extends('adminlte::page')

@section('content_header')
    <h1><b>Crear nueva unidad</b></h1>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de registro</h3>
                </div>

                <form action="{{ url('/admin/unidades') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre') }}" placeholder="Ej: Unidad, Caja, Metro" required>
                            @error('nombre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="abreviatura">Abreviatura</label>
                            <input type="text" name="abreviatura" class="form-control @error('abreviatura') is-invalid @enderror"
                                   value="{{ old('abreviatura') }}" placeholder="Ej: un, caja, m">
                            @error('abreviatura')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" rows="3" class="form-control @error('descripcion') is-invalid @enderror"
                                      placeholder="Detalle o uso de esta unidad">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ url('/admin/unidades') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar unidad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
