@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Unidades</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Unidades Registradas</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/unidades/create') }}" class="btn btn-primary">Crear nueva unidad</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped table-sm">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Abreviatura</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unidades as $index => $unidad)w
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $unidad->nombre }}</td>
                                    <td>{{ $unidad->descripcion ?? '—' }}</td>
                                    <td>{{ $unidad->abreviatura ?? '—' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ url('/admin/unidades/' . $unidad->id . '/edit') }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ url('/admin/unidades/' . $unidad->id) }}" method="POST" style="display: inline;" id="formulario{{ $unidad->id }}" onsubmit="confirmar{{ $unidad->id }}(event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <script>
                                            function confirmar{{ $unidad->id }}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Está seguro de eliminar esta unidad?',
                                                    text: "¡No podrás revertir esto!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    cancelButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('formulario{{ $unidad->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        #table1_wrapper .dt-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .btn-sm {
            padding: 4px 8px;
        }

        .btn-primary { background-color: #6c757d; color: #fff; }
        .btn-success { background-color: #28a745; color: #fff; }
        .btn-danger  { background-color: #dc3545; color: #fff; }
    </style>
@stop

@section('js')
    <script>
        $(function() {
            $('#table1').DataTable({
                "pageLength": 5,
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ unidades",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ unidades",
                    "infoEmpty": "Mostrando 0 a 0 de 0 unidades",
                    "infoFiltered": "(filtrado de _MAX_ unidades en total)",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "autoWidth": false
            });
        });
    </script>
@stop
