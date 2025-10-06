@extends('layouts.admin')
@section('content')
<div class="row">
  <h3><b>Bienvenido:</b>{{ Auth::user()->email }} / <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first() }}</h3>
</div>

<hr>
<div class="row">

  @can('admin.usuarios.index')

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $total_usuarios }}</h3>
        <p>Usuarios</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-file-person"></i>
      </div>
      <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  @can('admin.secretarias.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ $total_secretarias }}</h3>
        <p>Secretaria</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-person-circle"></i>
      </div>
      <a href="{{ url('admin/secretarias') }}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan

  @can('admin.pacientes.index')
  <!--pacientes-->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $total_pacientes }}</h3>
        <p>Pacientes</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-person-fill-check"></i>
      </div>
      <a href="{{ url('admin/pacientes') }}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan
  @can('admin.consultorios.index')
  <!--consultorios-->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $total_consultorios }}</h3>
        <p>Consultorios</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-building-fill-add"></i>
      </div>
      <a href="{{ url('admin/consultorios') }}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan
  @can('admin.doctores.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $total_doctores }}</h3>
        <p>Doctores</p>
      </div>
      <div class="icon">
        <i class="ion fas bi-person-lines-fill"></i>
      </div>
      <a href="{{ url('admin/doctores') }}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan
  @can('admin.horarios.index')
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3>{{ $total_horarios }}</h3>
        <p>Horarios</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-calendar2-week"></i>
      </div>
      <a href="{{ url('admin/horarios') }}" class="small-box-footer">Más información <i class="fas bi bi-file-person"></i></a>
    </div>
  </div>
  @endcan
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <h3 class="card-title">Calendario de atencion de odontologos</h3>
          </div>
          <div class="col-md-4">
            <div style="float:right">
              <label for="">Consultorio:</label>
            </div>
          </div>
          <div class="col-md-4">
            <select name="consultorio_id" id="consultorio_select" class="form-control">
              <option value="">Seleccione un consultorio...</option>
              @foreach ($consultorios as $consultorio)
              <option value="{{ $consultorio->id }}">{{ $consultorio->nombre."-".$consultorio->ubicacion }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <script>
        $('#consultorio_select').on('change', function() {
          var consultorio_id = $('#consultorio_select').val();
          //alert(consultorio_id);

          if (consultorio_id) {
            $.ajax({
              url: "{{ url('/consultorios/')}}" + '/' + consultorio_id,
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
      <hr>
      <div id="consultorio_info">

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-warning">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <h3 class="card-title">Calendario de atencion de odontologos</h3>
          </div>
          <div class="col-md-4">
            <div style="float:right">
              <label for="">Consultorio:</label>
            </div>
          </div>
          <div class="col-md-4">
            <select name="consultorio_id" id="consultorio_select" class="form-control">
              <option value="">Seleccione un consultorio...</option>
              @foreach ($consultorios as $consultorio)
              <option value="{{ $consultorio->id }}">{{ $consultorio->nombre."-".$consultorio->ubicacion }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id='calendar'></div>
      </div>
    </div>
  </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'es'
        });
        calendar.render();
      });

    </script>
@endsection