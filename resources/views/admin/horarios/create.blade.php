@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de una nuevo horario</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-3">
                    <form action="{{ url('/admin/horarios/create') }}" method="post">

                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Consultorio</label> <b>*</b>
                                    <select name="consultorio_id" id="consultorio_select" class="form-control">
                                        <option value="" disabled="">Seleccionar consultorio</option>
                                        @foreach ($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre."-".$consultorio->ubicacion }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                    $('#consultorio_select').on('change', function() {
                        var consultorio_id = $('#consultorio_select').val();
                        //alert(consultorio_id);
                        var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
                        url = url.replace(':id', consultorio_id);
                        if (consultorio_id) {
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function(data) {
                                    $('#consultorio_info').html(data);
                                },
                                error: function() {
                                    alert('error al obtener los datos del consultorio');
                                }
                            });
                        } else {
                            $('#consultorio_info').html('');
                        }
                    });
                </script>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Doctores</label> <b>*</b>
                                    <select name="doctor_id" id="" class="form-control">
                                        @foreach ($doctores as $doctore)
                                        <option value="{{ $doctore->id }}">{{ $doctore->nombres." ".$doctore->apellidos."-".$doctore->especialidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Dia</label> <b>*</b>
                                    <select name="dia" id="" class="form-control">
                                        <option value="LUNES">Lunes</option>
                                        <option value="MARTES">Martes</option>
                                        <option value="MIERCOLES">Miercoles</option>
                                        <option value="JUEVES">Jueves</option>
                                        <option value="VIERNES">Viernes</option>
                                        <option value="SABADO">Sabado</option>
                                        <option value="DOMINGO">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Inicio</label> <b>*</b>
                                    <input type="time" value="{{ old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Final</label> <b>*</b>
                                    <input type="time" value="{{ old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar Nuevo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div id="consultorio_info">

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection