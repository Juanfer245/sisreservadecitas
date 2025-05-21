@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Listado de Usuarios</h1>
</div>
<hr>
<div class="row">
  <div class="col-md-10">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Usuarios Registrados</h3>
        <div class="card-tools">
          <a href="{{ url('admin/usuarios/create') }}" class="btn btn-primary">
            Registrar Nuevo
          </a>
        </div>
      </div>
      <div class="card-body">
        
        <table class="table table-striped table-bordered table-hover table-sm">
          <thead style="background-color: #c0c0c0">
            <tr>
              <td style="text-align:center"><b>Nro</b></td>
              <td style="text-align:center"><b>Nombre</b></td>
              <td style="text-align:center"><b>Email</b></td>
              <td style="text-align:center"><b>Acciones</b></td>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            @foreach ($usuarios as $usuario)
            <tr>
              <td style="text-align:center">{{ $contador++ }}</td>
              <td style="text-align:center">{{ $usuario->name }}</td>
              <td style="text-align:center">{{ $usuario->email }}
              <td>
                ver / editar / borrar
              </td>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection