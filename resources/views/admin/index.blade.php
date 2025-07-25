@extends('layouts.admin')
@section('content')
  <div class="row">
  <h1>Panel Principal</h1>
  </div>

  <hr>
  <div class="row">
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
  </div>
@endsection