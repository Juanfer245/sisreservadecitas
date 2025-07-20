@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Paciente: {{ $paciente->nombres }}{{ $paciente->apellidos }}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-10">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Estas seguro de eliminar este registro?</h3>
            </div>
            <div class="card-body">

                    <form action="{{ url('/admin/pacientes',$paciente->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombres</label>
                                <p>{{ $paciente->nombres }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label>
                                <p>{{ $paciente->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">CI</label> <b>*</b>
                                <p>{{ $paciente->ci }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nro de seguro</label> <b>*</b>
                                <p>{{ $paciente->nro_seguro }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Fecha de nacimiento</label> <b>*</b>
                                <p>{{ $paciente->fecha_nacimiento}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Genero</label> <b>*</b>
                                <p>
                                    @if ($paciente->genero=='M')MASCULINO @else Femenino @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Celular</label> <b>*</b>
                                <p>{{ $paciente->celular }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email</label> <b>*</b>
                                <p>{{ $paciente->correo }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Direccion</label> <b>*</b>
                                <p>{{ $paciente->direccion }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Grupo Sanguineo</label> <b>*</b>
                                <p>{{ $paciente->grupo_sanguineo }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Alergias</label> <b>*</b>
                                <p>{{ $paciente->alergias }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Contacto de emergencia</label> <b>*</b>
                                <p>{{ $paciente->contacto_emergencia }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Observaciones</label> <b>*</b>
                                <p>{{ $paciente->observaciones }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">Volver</a>
                                <button type="submit" class="btn btn-danger">Eliminar Paciente</button>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection