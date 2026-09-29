@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading titulo-seccion">Crear Maestros</h3>
  </div>
      <div class="section-body">
          <div class="row justify-content-center">
              <div class="col-lg-8 col-md-10 col-sm-12">
                  <div class="card formulario-card">
                      <div class="card-body">
                        @if ($errors->any())
                             <div class="alert alert-dark alert-dismissible fade show" maestro="alert">
                                <strong>!Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{[$error]}</span>
                                    @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                        @endif
                      <form method="POST" action="{{ route('Maestros.store') }}">
                              @csrf
                              <div class="form-group">
                                  <label for="NombreMaestro">Maestro:</label>
                                  <input type="text" class="form-control" id="NombreMaestro" name="NombreMaestro">
                              </div>
                              <div class="form-group">
                                  <label for="Correos">Correo:</label>
                                  <input type="text" class="form-control" id="Correos" name="Correos">
                                  
                              </div>
                              <div class="form-group">
                                  <label for="carrera_ids">Carrera:</label>
                                  <select class="select2" id="carrera_ids" name="carrera_ids[]" multiple required>
        @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->IdCarreras }}">{{ $carrera->NombreCarrera }}</option>
                                    @endforeach
    </select>
                              </div>
                              
                              <div class="text-center">
                              
                                <button type="submit" class="btn-guardar">
                                    <i class="fas fa-save me-2"></i>Guardar
                                </button>
                                
                                <a href="{{ route('Maestros.index') }}"class="btn-cancelar">
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
    .select2-container .select2-selection--single {
            font-family: 'Century Gothic', sans-serif;
            background-color: white; 
            color: black !important;
            font-size: 14px;
            border-color: lightgray !important;
        }

        .select2.select2-container .select2-selection .select2-selection__arrow {
            background: white !important;
            border-left: 1px solid #ccc;
            -webkit-border-radius: 0 3px 3px 0;
            -moz-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
            height: 22px;
            width: 23px;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
            background: white !important; 
            color: black !important;
        }

        .select2-container .select2-selection--single:hover {
            font-family: 'Century Gothic', sans-serif;
            background-color: white !important; 
            color: blue;
            font-size: 14px;
        }

        .select2-container {
            width: 100% !important; 
            border-color: lightgray !important;
        }

        .select2-search__field {
            font-family: Century Gothic, sans-serif; 
            font-size: 14px;
             color: black !important; 
        }

        .select2-results__option {
            background-color: white !important; 
            color: black !important; 
            font-family: Century Gothic, sans-serif; 
            padding: 8px;
            font-size: 14px;
        }

        .select2-results__option:hover {
            background-color: lightgray !important; 
            font-size: 14px;
            border-color: lightgray !important;
        }
        .select2-container--default .select2-selection--multiple {
                background-color: #f1f1f1 !important;
                color:black !important; /* Fondo */
                border: 1px solid #007bff; /* Color del borde */
                border-radius: 0.25rem; /* Bordes redondeados */
            }
        .select2-container--default .select2-selection--multiple .select2-selection__placeholder{
            background-color: #f1f1f1 !important;
                color:black !important; /* Fondo */
                border: 1px solid #007bff; /* Color del borde */
                border-radius: 0.25rem; /* Bordes redondeados */
        }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #007bff !important; /* Color de las opciones seleccionadas */
                color: white !important; /* Color del texto de las opciones seleccionadas */
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                color: white !important; /* Color de la "X" para quitar opciones */
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
                color: #ff4d4d !important; /* Color de la "X" al pasar el mouse */
            }

            .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
                color: #6c757d !important; /* Color del placeholder */
            }
            
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
        <!-- Incluir Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <!-- Incluir jQuery y Select2 JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#carrera_ids').select2({
                    placeholder: "Selecciona las carreras",
                    allowClear: true
                });
            });
        </script>

@endsection
@endcan

