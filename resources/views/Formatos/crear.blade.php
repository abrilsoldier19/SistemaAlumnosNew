@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
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
                      <form method="POST" action="{{ route('Formatos.store') }}">
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
                                  <label for="nombre">Nombre del alumno:</label>
                                  <input type="text" class="form-control" id="nombre" name="nombre" >
                              </div>
                              <div class="form-group">
                                  <label for="U1">U1:</label>
                                  <input type="text" class="form-control" id="U1" name="U1">
                              </div>
                              <div class="form-group">
                                  <label for="U2">U2:</label>
                                  <input type="text" class="form-control" id="U2" name="U2">
                              </div>
                              <div class="form-group">
                                  <label for="U3">U3:</label>
                                  <input type="text" class="form-control" id="U3" name="U3">
                              </div>
                              <div class="form-group">
                                  <label for="U4">U4:</label>
                                  <input type="text" class="form-control" id="U4" name="U4">
                              </div>
                              <div class="form-group">
                                  <label for="U5">U5:</label>
                                  <input type="text" class="form-control" id="U5" name="U5">
                              </div>
                              <div class="form-group">
                                  <label for="U6">U6:</label>
                                  <input type="text" class="form-control" id="U6" name="U6">
                              </div>
                              <div class="form-group">
                                  <label for="U7">U7:</label>
                                  <input type="text" class="form-control" id="U7" name="U7">
                              </div>
                              <div class="form-group">
                                  <label for="U8">U8:</label>
                                  <input type="text" class="form-control" id="U8" name="U8">
                              </div>
                              <div class="form-group">
                                  <label for="U9">U9:</label>
                                  <input type="text" class="form-control" id="U9" name="U9">
                              </div>
                              <div class="form-group">
                                  <label for="U10">U10:</label>
                                  <input type="text" class="form-control" id="U10" name="U10">
                              </div>
                              <div class="form-group">
                                  <label for="U11">U11:</label>
                                  <input type="text" class="form-control" id="U11" name="U11">
                              </div>
                              <div class="form-group">
                                  <label for="U12">U12:</label>
                                  <input type="text" class="form-control" id="U12" name="U12">
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