@can('crear-rol')

@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Anexo 14 IND MATERIA</h3>
      <div class="card-body">
        <h4>Bienvenido . {{ auth()->user()->name }} {{ auth()->user()->email }} </h4>
     </div>
  </div>
  
  <div>
    <p style="color: black; text-align: center; font-family: Century Gothic, sans-serif; font-size: 17px; text-align: justify; font-weight: bold;">
      Querido alumno/a, publica tu archivo de la siguiente manera:
    </p>
    <p style="color: #0000B0; text-align: center; font-family: Century Gothic, sans-serif; font-size: 17px; text-align: justify; font-weight: bold;">
      Nombre_Apellido_Matricula.pdf
    </p>
    <form action="{{ route('FormatoAnexo14.upload') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="pdfFile">
      @can('crear-rol')
          <a type="button" class="btn btn-primary" href="{{ route('FormatoAnexo14.upload') }} ">Subir reporte</a>
       @endcan
    </form>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Display any success message if needed -->
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@endcan
