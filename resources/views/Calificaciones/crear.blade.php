@can('crear-rol')
@extends('layouts.app')
@section('content')
<section class="section">
<head>
        <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

  <div class="section-header">
      <h3 class="page__heading">Crear Calificaciones</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                      @if (session('success'))
                         <div class="alert alert-success">
                             {{ session('success') }}
                         </div>
                      @endif
                      @if (session('error'))
                         <div class="alert alert-danger">
                             {{ session('error') }}
                         </div>
                      @endif
                      
                      <form method="POST" action="{{ route('Calificaciones.store') }}">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                              @csrf
                              <div class="form-group">
                                  <label for="Alumno_id">Alumno:</label>
                                  <select class="form-control" id="Alumno_id" name="Alumno_id">
                                      @foreach($alumnos as $alumno)
                                          @if($alumno)
                                              <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
                                          @endif
                                      @endforeach
                                </select>
                            </div> 
                              <div class="form-group">
                                  <label for="Materia_id">Materia:</label>
                                  <select class="form-control select2" id="Materia_id" name="Materia_id">
                                     @foreach($materias as $materia)
                                              <option value="{{ $materia->IdMaterias }}">{{ $materia->NombreMateria }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group" id="unidades-container">
                                    <label>Calificaciones por Unidad:</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="calificaciones[]" placeholder="Calificacion Unidad 1" step="0.0001" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-success add-unit" type="button">A&ntilde;adir Unidad</button>
                                        </div>
                                    </div>
                                </div>
                              
                              <div class="form-group">
                                  <label for="Semester">Semester:</label>
                                  <select class="form-control" id="Semester" name="Semester">
                                      @foreach($semestres as $semestre)
                                              <option value="{{ $semestre->Semestre }}">{{ $semestre->Semestre }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="Maestro">Maestro:</label>
                                    <select class="form-control select2" id="Maestro" name="Maestro">
                                        @foreach($maestros as $maestro)
                                              <option value="{{ $maestro->NombreMaestro }}">{{ $maestro->NombreMaestro }}</option>
                                        @endforeach
                                    </select>
                              </div>
                            <div class="form-group">
                                <label for="ciclo_escolar">Ciclo escolar:</label>
                                <select class="form-control" id="ciclo_escolar" name="ciclo_escolar">
                                        @foreach($cicloescolars as $cicloescolar)
                                              <option value="{{ $cicloescolar->A√±o }}">{{ $cicloescolar->A√±o }}</option>
                                        @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                  <label for="Carrera_id">Carrera:</label>
                                  <select class="form-control" id="Carrera_id" name="Carrera_id">
                                     @foreach($carreras as $carrera)
                                              <option value="{{ $carrera->IdCarreras }}">{{ $carrera->NombreCarrera }}</option>
                                    @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                  <label for="turno">Turno:</label>
                                  <select class="form-control" id="turno" name="turno">
                                      <option value="Matutino">Matutino</option>
                                      <option value="Vespertino">Vespertino</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="salon">Salon:</label>
                                  <select class="form-control" id="salon" name="salon">
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
                              <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>             
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- JavaScript para manejar la adiciè´—n de unidades dinè´°micamente -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.add-unit').addEventListener('click', function () {
        const container = document.getElementById('unidades-container');
        const newUnitIndex = container.querySelectorAll('.input-group').length + 1;

        const newUnit = document.createElement('div');
        newUnit.classList.add('input-group', 'mb-3');
        newUnit.innerHTML = `
            <input type="number" class="form-control" name="calificaciones[]" placeholder="Calificacion Unidad ${newUnitIndex}" step="0.0001" required>
            <div class="input-group-append">
                <button class="btn btn-danger remove-unit" type="button">Eliminar</button>
            </div>
        `;

        container.appendChild(newUnit);

        // Agregar funcionalidad de eliminar
        newUnit.querySelector('.remove-unit').addEventListener('click', function () {
            newUnit.remove();
        });
    });
    
    // Asignar eventos de eliminaciè´—n a las unidades existentes
    document.querySelectorAll('.remove-unit').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.input-group').remove();
        });
    });
});
$(document).ready(function () {

    $('.select2').select2({
        theme: "bootstrap-4",
        placeholder: "Seleccione una opciè´—n",
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

/* Opciè´—n seleccionada */
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