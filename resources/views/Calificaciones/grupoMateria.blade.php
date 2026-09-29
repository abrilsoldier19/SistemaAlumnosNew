@extends('layouts.app')

@section('content')
<section class="section">
    <head>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <div class="section-header" style="display: flex; justify-content: center; align-items: center; ">
        <h3 style="font-weight: bold; font-size: 40px; font-family: Century Gothic, sans-serif; color: #012EBF;">Grupos</h3>
    </div>


    
    <div class="card-body">
       <h4 align="center" style="font-family: Consolas, sans-serif;"> Bienvenido  {{ auth()->user()->name }} {{ auth()->user()->email }} </h4>
    </div>
    @if (Auth::user()->hasRole('Maestro'))
  <form action="{{ route('Calificaciones.grupoMateria') }}" method="GET">
    <div class="form-row justify-content-center">
        <div class="col-lg-2">
            <select class="form-control no-print" name="salon">
                <option value="">Salones</option>
                <option value="Salon A">Salon A</option>
                <option value="Salon B">Salon B</option>
                <option value="Salon C">Salon C</option>
                <option value="Salon D">Salon D</option>
                <option value="Salon E">Salon E</option>
                <option value="Salon F">Salon F</option>
                <option value="Salon G">Salon G</option>
                <option value="Salon H">Salon H</option>
            </select>
        </div>
        <div class="col-lg-2">
            <select class="form-control no-print" name="turno">
                <option value="">Turnos</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
            </select>
        </div>
        <div class="col-lg-2">
            <select class="form-control no-print" name="Carrera" id="carrera">
                <option value="">Todos los carreras</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->IdCarreras }}" {{ $filtroCarrera == $carrera->IdCarreras ? 'selected' : '' }}>{{ $carrera->NombreCarrera }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <select class="form-control no-print" name="Alumno" id="Alumno">
                <option value="">Todos los alumnos</option>
                @foreach($alumnos as $alumno)
                @if($alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <select class="form-control no-print" name="Semestre">
                <option value="">Semestres</option>
                <option value="1er Semestre">1er Semestre</option>
                <option value="2do Semestre">2do Semestre</option>
                <option value="3er Semestre">3er Semestre</option>
                <option value="4to Semestre">4to Semestre</option>
                <option value="5to Semestre">5to Semestre</option>
                <option value="6to Semestre">6to Semestre</option>
            </select>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-lg-1.5">
            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
        </div>
    </div>
</form>
<div class="row mb-4">
        <h5 style="font-weight: bold; font-size: 20px; font-family: Century Gothic, sans-serif; color: #012EBF;">Cantidad de alumnos por materia y salón asignados a usted:</h5>
        @foreach ($cantidadAlumnos as $count)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-users"></i>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Materia: {{ $count->materias->NombreMateria }}</h5>
                        <p class="text-muted mb-0">Salón: {{ $count->salon }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="badge bg-light text-dark">Cantidad de Alumnos: {{ $count->student_count }}</span>
                </div>
                
                <!-- Check if there is a matching entry in cantidadAlumnos -->
                @php
                    // Find the first matching entry for Materia_id and IdCalificacions
                    $matchingCalificacion = $cantidadAlumnos->first(function($item) use ($count) {
                        return $item->Materia_id === $count->Materia_id && $item->salon === $count->salon;
                    });
                @endphp

                @if ($matchingCalificacion)
                    <a href="{{ route('Calificaciones.editarCalificaciones', ['id' => $matchingCalificacion->IdCalificacions]) }}" class="btn btn-primary">Editar</a>
                @endif
                
                <button onclick="window.location='{{ route('Calificaciones.index') }}'" class="btn btn-secondary btn-sm">Seguimiento</button>
            </div>
        </div>
    </div>
@endforeach
    </div>
@endif
      
    </section>
    <style>
  
  .form-row {
    margin-bottom: 10px;
}

.form-control {
    font-size: 16px;
    border-radius: 10px;
    border: 2px solid #ccc;
    padding: 10px;
    transition: border-color 0.3s ease;
    font-family: Century Gothic, sans-serif;
}

.form-control:focus {
    outline: none;
    border-color: #6c63ff;
    font-family: Century Gothic, sans-serif;
}

.btn-primary {
    background-color: #6c63ff;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    cursor: pointer;
    font-family: Century Gothic, sans-serif;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #524bd4;
}

/* Flexbox layout for responsive display */
@media (max-width: 991px) {
    .form-row.justify-content-center {
        flex-wrap: wrap;
    }

    .form-row.justify-content-center .col-lg-2 {
        flex-basis: 48%;
    }
}

@media (max-width: 767px) {
    .form-row.justify-content-center .col-lg-2 {
        flex-basis: 100%;
    }
}

</style>
@endsection
 