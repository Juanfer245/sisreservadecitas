@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de Consultorios</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Consultorios Registrados</h3>
                <div class="card-tools">
                    <a href="{{ url('admin/consultorios/create') }}" class="btn btn-primary">
                        Registrar Nuevo
                    </a>
                </div>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                            <td style="text-align:center"><b>Nro</b></td>
                            <td style="text-align:center"><b>Consultorio</b></td>
                            <td style="text-align:center"><b>Ubicacion</b></td>
                            <td style="text-align:center"><b>Capacidad</b></td>
                            <td style="text-align:center"><b>Telefono</b></td>
                            <td style="text-align:center"><b>Especialidad</b></td>
                            <td style="text-align:center"><b>Estado</b></td>
                            <td style="text-align:center"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach ($consultorios as $consultorio)
                        <tr>
                            <td style="text-align:center">{{ $contador++ }}</td>
                            <td style="text-align:center">{{ $consultorio->nombre }}</td>
                            <td style="text-align:center">{{ $consultorio->ubicacion}}
                            <td style="text-align:center">{{ $consultorio->capacidad }}
                            <td style="text-align:center">{{ $consultorio->telefono }}
                            <td style="text-align:center">{{ $consultorio->especialidad }}
                            <td style="text-align:center">{{ $consultorio->estado }}
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ url('/admin/consultorios/'.$consultorio->id) }}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <a href="{{ url('admin/consultorios/'.$consultorio->id.'/edit') }} " type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ url('admin/consultorios/'.$consultorio->id.'/confirm-delete') }}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 5,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Consultorios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Consultorios",
                                "infoFiltered": "(Filtrado de _MAX_ total Consultorios)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Consultorios",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscador:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    }, {
                                        extend: 'csv'
                                    }, {
                                        extend: 'excel'
                                    }, {
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }]
                                },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed three-column'
                                }
                            ],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection