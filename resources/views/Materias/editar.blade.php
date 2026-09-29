@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Editar Materias</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">       
                      <form method="POST" action="{{ route('Materias.update', $materia->IdMaterias) }}"> 
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                  <label for="NombreMateria">Materias de 1er, 2do, 3er y 4to semestre de las carreras:</label>
                                  <input type="text" class="form-control" id="NombreMateria" name="NombreMateria" value="{{ old('NombreMateria', $materia->NombreMateria) }}">
                            </div>
                            <div class="form-group">
                                  <label for="carrera_id">Carrera:</label>
                                  <select class="form-control" id="carrera_id" name="carrera_id">
                                    @foreach($carreras as $carrera)
                                             <option value="{{ $carrera->IdCarreras }}" {{ $carrera->IdCarreras == $materia->carrera_id ? 'selected' : '' }} >
                                                {{ $carrera->NombreCarrera }}
                                            </option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                  <label for="semestre_id">Semestre:</label>
                                  <select class="form-control" id="semestre_id" name="semestre_id">
                                    @foreach($semestres as $semestre)
                                        <option value="{{ $semestre->IdSemestres }}" {{ $semestre->IdSemestres == $materia->semestre_id ? 'selected' : '' }}>
                                            {{ $semestre->Semestre }}
                                        </option>
                                    @endforeach
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
@endsection
@endcan