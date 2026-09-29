@can('editar-rol')
@extends('layouts.app')

@section('content')
<section class="section">
    
    <head>
        <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
</head>
    
  <div class="section-header">
      <h3 class="page__heading">Editar Formato 14</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body"> 
                      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form method="POST" action="{{ route('FormatoAnexo14.update', $formatos->IdFormato14) }}"> 
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                  <label for="Alumno_id">Alumno:</label>
                                  <select class="form-control" id="Alumno_id" name="Alumno_id">
                                      @foreach($alumnos as $alumno)
                                          @if($alumno)
                                              <option value="{{ $alumno->id }}" {{ $formatos->Alumno_id == $alumno->id ? 'selected' : '' }}>
                                                 {{ $alumno->name }}
                                              </option>
                                          @endif
                                      @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="Materia_id">Materia:</label>
                                <select class="form-control select2" id="Materia_id" name="Materia_id">
                                      @foreach($materias as $materia)
                                            <option value="{{ $materia->IdMaterias }}" {{ $formatos->Materia_id == $materia->IdMaterias ? 'selected' : '' }}>
                                                {{ $materia->NombreMateria }}
                                            </option>
                                      @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="unidades-container">
                                <label>Calificaciones por Unidad:</label>
                                @foreach($unidadData as $index => $unidad)
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="calificaciones[]" step="0.0001" value="{{ $unidad['Calificacion_Parcial'] }}" placeholder="Calificación {{ $unidad['NumeroUnidad'] }}" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-danger remove-unit" type="button">Eliminar</button>
                                        </div>
                                    </div>
                                @endforeach
                                
                                <!-- Botón para añadir unidad -->
                                <div class="text-right">
                                    <button class="btn btn-success add-unit" type="button">Añadir Unidad</button>
                                </div>
                            </div>
                            <div class="form-group">
                                  <label for="Semestre_id">Semestre:</label>
                                  </select>
                                  <select class="form-control @error('Semester') is-invalid @enderror" id="Semestre_id" name="Semestre_id">
                                    @foreach($semestres as $semestre)
                                        <option value="{{ $semestre->IdSemestres }}" {{ $formatos->Semestre_id == $semestre->IdSemestres ? 'selected' : '' }}>
                                            {{ $semestre->Semestre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('Semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                            <div class="form-group">
                                  <label for="Carrera_id">Carrera:</label>
                                  <select class="form-control" id="Carrera_id" name="Carrera_id">
                                     @foreach($carreras as $carrera)
                                             <option value="{{ $carrera->IdCarreras }}" {{ $formatos->Carrera_id == $carrera->IdCarreras ? 'selected' : '' }} >
                                                {{ $carrera->NombreCarrera }}
                                            </option>
                                    @endforeach
                                    </select>
                              </div>
                            <div class="form-group">
                                  <label for="Maestro">Maestro:</label>
                                    <select class="form-control select2" id="Maestro" name="Maestro">
                                        @foreach($maestros as $maestro)
                                            <option value="{{ $maestro->NombreMaestro }}" {{ $formatos->Maestro == $maestro->NombreMaestro ? 'selected' : '' }}>
                                                {{ $maestro->NombreMaestro }}
                                            </option>
                                        @endforeach
                                    </select>
                             </div>
                            <div class="form-group">
                                  <label for="Turno">Turno:</label>
                                  <select class="form-control" id="Turno" name="Turno">
                                      <option value="Matutino" {{ $formatos->Turno == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                                      <option value="Vespertino" {{ $formatos->Turno == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                  <label for="Salon">Salon:</label>
                                  <select class="form-control @error('salon') is-invalid @enderror" id="Salon" name="Salon">
                                    <option value="B" {{ $formatos->Salon == 'B' ? 'selected' : '' }}>Salon B</option>
                                    <option value="C" {{ $formatos->Salon == 'C' ? 'selected' : '' }}>Salon C</option>
                                    <option value="D" {{ $formatos->Salon == 'D' ? 'selected' : '' }}>Salon D</option>
                                    <option value="E" {{ $formatos->Salon == 'E' ? 'selected' : '' }}>Salon E</option>
                                    <option value="F" {{ $formatos->Salon == 'F' ? 'selected' : '' }}>Salon F</option>
                                    <option value="G" {{ $formatos->Salon == 'G' ? 'selected' : '' }}>Salon G</option>
                                    <option value="H" {{ $formatos->Salon == 'H' ? 'selected' : '' }}>Salon H</option>
                                    <!-- Agrega más opciones de salones aquí -->
                                </select>
                              </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>         
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    
      <!-- jQuery (si no lo tienes ya) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('unidades-container');

    // Agregar una nueva unidad
    document.querySelector('.add-unit').addEventListener('click', function () {
        const unitCount = container.querySelectorAll('.input-group').length + 1;

        const newUnit = document.createElement('div');
        newUnit.classList.add('input-group', 'mb-3');
        newUnit.innerHTML = `
            <input type="number" class="form-control" name="calificaciones[]" placeholder="Calificación Unidad ${unitCount}" step="0.0001" required>
            <div class="input-group-append">
                <button class="btn btn-danger remove-unit" type="button">Eliminar</button>
            </div>
        `;

        container.insertBefore(newUnit, container.querySelector('.text-right'));

        // Agregar evento para eliminar unidad
        newUnit.querySelector('.remove-unit').addEventListener('click', function () {
            newUnit.remove();
        });
    });

    // Asignar eventos de eliminación a las unidades existentes
    document.querySelectorAll('.remove-unit').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.input-group').remove();
        });
    });
});

$(document).ready(function() {
        $('#Maestro').select2({
            theme: "bootstrap-4",
            placeholder: "Buscar maestro...",
            allowClear: true
        });
        
        $('#Materia_id').select2({
            theme: "bootstrap-4",
            placeholder: "Buscar materia...",
            allowClear: true
        });
    });
</script>

<style>
   .select2-container--default .select2-selection--single {
    background-color: rgba(194, 194, 194, 0.30) !important; /* color fondo */
    border: 2px rgb(11, 102, 206); /* azul */
    border-radius: 12px;
    height: 45px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: black; /* texto gris oscuro */
    font-weight: 500;
    font-size: 16px;
    padding-left: 12px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    right: 10px;
    top: 10px;
}
/* Opciones normales */
.select2-container--default .select2-results__option {
    padding: 10px;
    font-size: 15px;
    cursor: pointer;
    background-color: rgb(214, 223, 238) !important;
    
    font-weight: bold;
    transition: all 0.7s ease;
}

/* Hover / resaltado al mover el mouse o flechas */
.select2-container--default .select2-results__option--highlighted {
    background-color: rgb(136, 184, 238) !important; /* color hover */
    color: black !important;
}

/* Opción seleccionada */
.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: rgb(136, 184, 238) !important; /* color seleccionado */
    color: black !important;
}

.select2-container--open .select2-dropdown {
    top: 100% !important;   /* siempre debajo */
    bottom: auto !important;
    color:rgb(0, 0, 0) !important;
    background-color: rgb(214, 223, 238) !important;
}


</style>

@endsection
@endcan