@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Consultorio:{{ $consultorio->nombre }}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-10">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro/a de eliminar este registro?</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/consultorios',$consultorio->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre del consultorio</label>
                                <p>{{ $consultorio->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Ubicacion</label>
                                <p>{{$consultorio->ubicacion}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Capacidad</label>
                                <p>{{ $consultorio->capacidad }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono</label>
                                <p>{{ $consultorio->telefono }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Especialidad</label>
                                <p>{{$consultorio->especialidad}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Estado</label> <b>*</b>
                                <p>{{ $consultorio->estado }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar Consultorio</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
