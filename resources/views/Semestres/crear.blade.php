@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading titulo-seccion">Crear Semestres</h3>
  </div>
      <div class="section-body">
          <div class="row justify-content-center">
              <div class="col-lg-8 col-md-10 col-sm-12">
                  <div class="card formulario-card">
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
                      <form method="POST" action="{{ route('Semestres.store') }}">
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
                              <div class="form-group mb-4">
                                  <label class="form-label-custom" for="Semestre">Agrega el semestre:</label>
                                  <input type="text" class="form-control input-moderno" id="Semestre" name="Semestre">
                            </div>
                            <div class="text-center">
                              
                                <button type="submit" class="btn-guardar">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                                
                                <a href="{{ route('Semestres.index') }}"class="btn-cancelar">
                                    <i class="fas fa-arrow-left"></i>
                                    Cancelar
                                </a>
                            </div>
                        </form>
                                           
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    
    <style>
    /* TITULO */

.titulo-seccion{
    font-family: Century Gothic, sans-serif;
    font-size: 38px;
    font-weight: bold;
    color: #012EBF;
}

/* CARD */

.formulario-card{
    border: none;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,.08);
}

/* LABEL */

.form-label-custom{
    font-family: Century Gothic, sans-serif;
    font-weight: bold;
    color: #012EBF;
    margin-bottom: 10px;
}

/* INPUT */

.input-moderno{
    height: 55px;
    border-radius: 12px;
    border: 2px solid #e6e6e6;
    font-size: 16px;
    font-family: Century Gothic, sans-serif;
}

.input-moderno:focus{
    border-color: #012EBF;
    box-shadow: 0 0 10px rgba(1,46,191,.15);
}

/* BOTON guardar */

.btn-guardar{
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    transition: .3s;
    margin-right: 17px;
}

.btn-guardar:hover{
    background: #1d4ed8;
    color: white;
    text-decoration: none;
}

/* BOTON VOLVER */

.btn-cancelar{
    background: #f3f4f6;
    color: #333;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    display: inline-block;
    transition: .3s;
}

.btn-cancelar:hover{
    background: #e5e7eb;
    color: black;
    text-decoration: none;
}
</style>
@endsection
@endcan