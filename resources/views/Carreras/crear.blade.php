@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Crear Carreras</h3>
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
                      <form method="POST" action="{{ route('Carreras.store') }}">
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
                                  <label for="NombreCarrera">Nombre carrera</label>
                                  <input type="text" class="form-control" id="NombreCarrera" name="NombreCarrera">
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