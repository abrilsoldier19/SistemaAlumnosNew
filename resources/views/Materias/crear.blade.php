@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Crear Materias</h3>
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
                      <form method="POST" action="{{ route('Materias.store') }}">
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
                                  <label for="NombreMateria">Materias de 1er, 2do, 3er y 4to semestre de las carreras:</label>
                                  <input type="text" class="form-control" id="NombreMateria" name="NombreMateria">
                            </div>
                              <div class="form-group">
                                  <label for="carrera_id">Carrera:</label>
                                  <select class="form-control" id="carrera_id" name="carrera_id">
                                    @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->IdCarreras }}">{{ $carrera->NombreCarrera }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="semestre_id">Semestre:</label>
                                  <select class="form-control" id="semestre_id" name="semestre_id">
                                    @foreach($semestres as $semestre)
                                        <option value="{{ $semestre->IdSemestres }}">{{ $semestre->Semestre }}</option>
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
@endsection
@endcan