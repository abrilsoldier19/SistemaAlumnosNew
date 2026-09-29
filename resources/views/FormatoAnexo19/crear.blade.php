@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
  <div class="section-header">
      <h3 class="page__heading">Crear datos</h3>
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
                      <form method="POST" action="{{ route('FormatoAnexo19.store') }}">
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
                                  <label for="turno">Turno:</label>
                                  <select class="form-control" id="turno" name="turno">
                                      <option value="Matutino">Matutino</option>
                                      <option value="Vespertino">Vespertino</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="salon">Salon:</label>
                                  <select class="form-control" id="salon" name="salon">
                                      <option value="Salón A">Salón A</option>
                                      <option value="Salón B">Salón B</option>
                                      <option value="Salón C">Salón C</option>
                                      <option value="Salón D">Salón D</option>
                                      <option value="Salón E">Salón E</option>
                                      <option value="Salón F">Salón F</option>
                                      <option value="Salón G">Salón G</option>
                                      <option value="Salón H">Salón H</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="Semestre">Semestre:</label>
                                  <select class="form-control" id="Semestre" name="Semestre">
                                      <option value="1er Semestre">1er Semestre</option>
                                      <option value="2do Semestre">2do Semestre</option>
                                      <option value="3er Semestre">3er Semestre</option>
                                      <option value="4to Semestre">4to Semestre</option>
                                      <option value="5to Semestre">5to Semestre</option>
                                      <option value="6to Semestre">6to Semestre</option>
                                      <option value="7mo Semestre">7mo Semestre</option>
                                      <option value="8vo Semestre">8vo Semestre</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="Maestro">Nombre Maestro:</label>
                                  @if (Auth::user()->hasRole('Administrador'))
                                        <select class="form-control" id="Maestro" name="Maestro">
                                            @foreach($maestros as $maestro)
                                               <option value="{{ $maestro->NombreMaestro }}">{{ $maestro->NombreMaestro }}</option>
                                            @endforeach
                                        </select>
                                  @endif
                                  
                                  @if (Auth::user()->hasRole('Maestro'))
                                        <select class="form-control" id="Maestro" name="Maestro">
                                            <option value="{{ auth()->user()->name }}">{{ auth()->user()->name }}</option>
                                        </select>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label for="Materia">Materia:</label>
                                  <select class="form-control" id="Materia" name="Materia">
                                     @foreach($materias as $materia)
                                              <option value="{{ $materia->IdMaterias }}">{{ $materia->NombreMateria }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="Carrera">Carrera:</label>
                                  <select class="form-control" id="Carrera" name="Carrera">
                                     @foreach($carreras as $carrera)
                                              <option value="{{ $carrera->IdCarreras }}">{{ $carrera->NombreCarrera }}</option>
                                    @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                  <label for="Alumno">Alumno:</label>
                                  <select class="form-control" id="Alumno" name="Alumno">
                                      @foreach($alumnos as $alumno)
                                          @if($alumno)
                                              <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
                                          @endif
                                      @endforeach
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
    <style>
        .form-group label {
    font-weight: bold;
    color: #333;
    font-family: Century Gothic, sans-serif;
    font-size: 15px;
}

.form-control {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    color: #555;
    font-family: Century Gothic, sans-serif;
}

.btn-primary {
    background-color: #0000D6;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    font-family: Century Gothic, sans-serif;
}

/* Additional styles for form layout */
.form-group {
    margin-bottom: 20px;
}
    </style>
@endsection
@endcan