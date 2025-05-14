@extends('adminlte::page')

@section('content_header')
<h1><b>Crear nueva marca</b></h1>
<hr>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro</h3>
                <a href="{{ route('admin.marcas.index') }}" class="btn btn-sm btn-secondary float-right">← Volver</a>
            </div>

            <form action="{{ route('admin.marcas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">

                    {{-- Nombre --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre <span style="color: red;">*</span></label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <small style="color: red; font-size: 12px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Descripción --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                                value="{{ old('descripcion') }}">
                            @error('descripcion')
                                <small style="color: red; font-size: 12px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- logo --}}
                    <div class="col-md-3">
                        <label for="logo">logo </label>
                        <input type="file" id="logo" name="logo" accept=".jpg, .jpeg, .png" class="form-control">
                        @error('logo')
                            <small style="color: red; font-size: 12px;">{{ $message }}</small>
                        @enderror
                        <br>
                        <center><output id="list"></output></center>
                        <script>
                            function archivo(evt) {
                                var files = evt.target.files;
                                for (var i = 0, f; f = files[i]; i++) {
                                    if (!f.type.match('image.*')) {
                                        continue;
                                    }
                                    var reader = new FileReader();
                                    reader.onload = (function(theFile) {
                                        return function(e) {
                                            document.getElementById("list").innerHTML = [
                                                '<img class="thumb" src="', e.target.result,
                                                '" width="70%" title="', escape(theFile.name), '"/>'
                                            ].join('');
                                        };
                                    })(f);
                                    reader.readAsDataURL(f);
                                }
                            }
                            document.getElementById('logo').addEventListener('change', archivo, false);
                        </script>
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
