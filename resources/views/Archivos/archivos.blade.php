@can('crear-rol')

@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
</head>
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Anexo 14 IND MATERIA</h3>
      <div class="card-body">
        <h4>Bienvenido . {{ auth()->user()->name }} {{ auth()->user()->email }} </h4>
     </div>
  </div>
  
  <div>
  @if (Auth::user()->hasRole('Alumno'))
      <div>
            <p style="color: black; text-align: center; font-family: Century Gothic, sans-serif; font-size: 17px; text-align: justify; font-weight: bold;">
                Querido alumno/a, publica tu archivo de la siguiente manera:
            </p>
            <p style="color: #0000B0; text-align: center; font-family: Century Gothic, sans-serif; font-size: 17px; text-align: justify; font-weight: bold;">
                Nombre_Apellido_Matricula.pdf
            </p>
                <a href="{{ url('/Archivos/create') }}" class="btn btn-success btn-sm" title="Agrega archivo">
                   <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                </a>
      </div>
  @endif
  @if (Auth::user()->hasRole('Maestro'))
      <div>
            <p style="color: #0000B0; text-align: center; font-family: Century Gothic, sans-serif; font-size: 17px; text-align: justify; font-weight: bold;">
                Reportes de alumnos Anexo 14
            </p>
      </div>
  @endif

  <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Nombre archivo</th>
                          <th>Archivo</th>
                  </thead>
                  <tbody>
                      @foreach($archivos as $archivo)
                          <tr>
                              <td style="">{{$archivo->alumnos->name}}
                              <td width= '50' height='50'>
                                <a href="{{ route('Archivos.descargar', $archivo->id) }}" class="btn btn-primary" style = "font-size: 12px;"> {{ $archivo->file_path}}</a></td>
                          </tr>
                          <td>
                             <form action="{{ route('Archivos.destroy', $archivo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                          </td>
                      @endforeach
                  </tbody>
               </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@endcan
