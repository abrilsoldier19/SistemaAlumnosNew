@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Editar Maestros</h3>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            @if ($errors->any())
              <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <strong>¡Revise los campos!</strong>
                <div class="mt-2">
                  @foreach ($errors->all() as $error)
                    <span class="badge badge-danger">{{ $error }}</span>
                  @endforeach
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <form method="POST" action="{{ route('Maestros.update', $maestro->IdMaestros) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="NombreMaestro">Maestro:</label>
                <input type="text" class="form-control" id="NombreMaestro" name="NombreMaestro"
                       value="{{ old('NombreMaestro', $maestro->NombreMaestro) }}">
              </div>

              <div class="form-group">
                <label for="Correos">Correo:</label>
                <input type="email" class="form-control" id="Correos" name="Correos"
                       value="{{ old('Correos', $maestro->Correos) }}">
              </div>

              <div class="form-group">
                <label for="carrera_ids">Carreras:</label>
                <select class="select2 form-control" id="carrera_ids" name="carrera_ids[]" multiple required>
                  @php
                    $seleccionadas = old('carrera_ids', $carrerasSeleccionadas ?? []);
                  @endphp
                  @foreach($carreras as $carrera)
                    <option value="{{ $carrera->IdCarreras }}"
                      {{ in_array($carrera->IdCarreras, $seleccionadas) ? 'selected' : '' }}>
                      {{ $carrera->NombreCarrera }}
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
