@can('crear-rol')

@extends('layouts.app')

@section('content')

<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Anexo 15 Casos Especiales 2021</h3>
      <div class="card-body">
        <h4>Bienvenido . {{ auth()->user()->name }} {{ auth()->user()->email }} </h4>
     </div>
  </div>
<form>
<button id="btnPrint" value="Print" class="btn btn-btn btn-dark" onclick="printTable()">Imprimir tabla</button>
</form>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        
                      <form action="{{ route('Formatos.index') }}" method="GET">
                      <div class="form-row justify-content-center filtros-busqueda">
                            @can('Administrador-rol')
                                <select id="selectMaestroForm" class="form-control custom-select no-print select2" style="font-family: Century Gothic, sans-serif;" name="maestro" onchange="mostrarNombreMaestro(this)">
                                    <option value="">Maestros</option>
                                    @foreach ($maestros as $maestro)
                                            <option value="{{ $maestro->NombreMaestro }}" {{ $maestroId == $maestro->IdMaestros ? 'selected' : '' }}>{{ $maestro->NombreMaestro }}</option>
                                    @endforeach
                                </select>
                            @endcan
                                <select class="form-control custom-select no-print select2" style="font-family: Century Gothic, sans-serif;" name="carrera_id" id="carrera_id">
                                    <option value="">Carreras</option>
                                    @foreach ($carreras as $carrera)
                                            <option value="{{ $carrera->IdCarreras }}" {{ $carreraId == $carrera->IdCarreras ? 'selected' : '' }}>{{ $carrera->NombreCarrera }}</option>
                                    @endforeach
                            </select>
                                <select class="form-control custom-select no-print select2" style="font-family: Century Gothic, sans-serif;" name="Semestre_id">
                                    <option value="">Semestres</option>
                                    <option value="1er Semestre">1er Semestre</option>
                                    <option value="2do Semestre">2do Semestre</option>
                                    <option value="3er Semestre">3er Semestre</option>
                                    <option value="4to Semestre">4to Semestre</option>
                                    <option value="5to Semestre">5to Semestre</option>
                                    <option value="6to Semestre">6to Semestre</option>

                                   <!--@foreach ($semestres as $semestre)-->
                                   <!--<option value="{{ $semestre->IdSemestres }}">{{ $semestre->Semestre}}</option>-->
                                   <!--@endforeach-->
                            </select>
                                <select class="form-control custom-select no-print select2" style="font-family: Century Gothic, sans-serif;" name="turno">
                                    <option value="">Turnos</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                </select>
                                <select class="form-control custom-select no-print select2" style="font-family: Century Gothic, sans-serif;" name="salon">
                                    <option value="">Salones</option>
                                    <option value="Salon A">Salon A</option>
                                    <option value="Salon B">Salon B</option>
                                    <option value="Salon C">Salon C</option>
                                    <option value="Salon D">Salon D</option>
                                    <option value="Salon E">Salon E</option>
                                    <option value="Salon F">Salon F</option>
                                    <option value="Salon G">Salon G</option>
                                    <option value="Salon H">Salon H</option>
                                </select>
                            <button type="submit" class="btn btn-primary">Mostrar</button>
                        </div>
                        </form>  
                        @csrf
                        @php
                            $maxUnits = 0;
                            
                            foreach ($estudiantes as $row) {
                                $nu = $row->numero_unidad ?? $row->NumeroUnidad ?? null;
                                $nums = [];
                                
                                if (is_numeric($nu)) {
                                    $nums = [(int) $nu];
                                } elseif (is_string($nu)) {
                                    if (strpos($nu, ',') !== false) {
                                        foreach (explode(',', $nu) as $p) {
                                            if (preg_match('/\d+/', $p, $m)) $nums[] = (int) $m[0];
                                        }
                                    } else {
                                        if (preg_match('/\d+/', $nu, $m)) $nums[] = (int) $m[0];
                                    }
                                }
                                
                                if (count($nums) > 1) {
                                    $maxUnits = max($maxUnits, count($nums));
                                } elseif (!empty($nums)) {
                                    $maxUnits = max($maxUnits, max($nums));
                                }
                            }
                         
                            if ($maxUnits < 1) $maxUnits = 1;
                            $totalCols = $maxUnits + 3;
                        @endphp

                        <table id="tabla_datos" class="table futuristic-table" style="; width: 100%; min-width: 700px; max-width: 1000px; margin: 0 auto;">
                            <thead>
                                <tr style=" color:black; font-family: Century Gothic, sans-serif; font-size: 24px; ">
                                    <td align="center" colspan="{{ $totalCols }}">Casos Especiales Anexo 15</td>
                                </tr>
                                <tr style=" color:black; font-family: Century Gothic, sans-serif; font-size: 19px; ">
                                    <td align="center" colspan="{{ $totalCols }}">
                                        @if (Auth::user()->hasRole('Maestro'))
                                            {{ auth()->user()->name }}
                                        @endif
                                        @can('Administrador-rol')
                                            <p id="nombreMaestroSeleccionado" style="margin:0; font-weight: bold;"></p>
                                        @endcan
                                    </td>
                                </tr>
                                <tr style="font-family: Century Gothic, sans-serif; font-size: 17px; ">
                                    <td rowspan="2" >Asignaturas</td>
                                    <td rowspan="2" >Alumnos</td>
                                    <td colspan="{{ $maxUnits }}" align="center" >Unidades</td>
                                    <td rowspan="2" align="center" >Observaciones</td>
                                </tr>
                                <tr style="font-family: Century Gothic, sans-serif; font-size: 13.5px; ">
                                    @for ($i = 1; $i <= $maxUnits; $i++)
                                        <th style="; color:black;">Unidad {{ $i }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @if ($estudiantes->count() > 0)
                                    @foreach ($estudiantes as $index => $estudiante)
                                        @php
                                            $unidades = explode(', ', (string)($estudiante->NumeroUnidad ?? $estudiante->numero_unidad ?? ''));
                                            $calificacionesParciales = explode(', ', (string)($estudiante->Calificacion_Parcial ?? $estudiante->calificacion_parcial ?? ''));
                                            
                                            $byUnit = [];
                                            
                                            foreach ($unidades as $i => $unidad) {
                                                if (preg_match('/\d+/', $unidad, $m)) {
                                                    $calificacion = isset($calificacionesParciales[$i]) ? floatval($calificacionesParciales[$i]) : null;
                                                    $byUnit[(int)$m[0]] = $calificacion;
                                                }
                                            }
                                        @endphp
                                        
                                        <tr style="border-collapse: collapse; ">
                                            <td >{{ $estudiante->NombreMateria }}</td>
                                            <td >{{ $estudiante->Alumno }}</td>
                                            @for ($i = 1; $i <= $maxUnits; $i++)
                                                @php 
                                                    $val = $byUnit[$i] ?? null; 
                                                @endphp
                                                <td style=" font-weight: bold;{{ $val !== null && $val < 70 ? 'color:red;' : 'color:black;' }}">
                                                    {{ $val ?? '' }}
                                                </td>
                                            @endfor
                                            <td align="center" style="; background-color: white; color:black;">
                                                @can('Administrador-rol')
                                                    {{ optional($formatos)->observaciones }}
                                                @endcan
                                                
                                                @if (Auth::user()->hasRole('Maestro'))
                                                    <form action="{{ route('Formatos.agregarComentarios') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="calificacion_id" value="{{ $estudiante->IdCalificacions }}">
                                                        <textarea name="observaciones" style="width: 190px; height: 60px;" class="form-control">{{ old('observaciones', $estudiante->observaciones) }}</textarea>
                                                        <button type="submit" class="btn artistic-btn no-print">Guardar</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

@section('scripts')
<script>
function printTable() {
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<style type="text/css">');
    printWindow.document.write(document.getElementById("table_style").innerHTML);
    printWindow.document.write('</style></head><body>');
    var table = document.getElementById("tabla_datos");
    printWindow.document.write(table.outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

function guardarComentarios(alumnoId) {
    var comentarios = document.getElementById('comentarios_' + alumnoId)?.value || '';

    $.ajax({
        method: 'POST',
        url: 'Formatos/agregarComentarios',
        data: { alumno_id: alumnoId, comentarios: comentarios },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert('Comentarios guardados exitosamente');
            } else {
                alert('Error al guardar los comentarios: ' + response.message);
            }
        },
        error: function(error) {
            alert('Error al guardar los comentarios: ' + (error?.message || ''));
        }
    });
}

// Si ya no usas el dropdown de unidades, no necesitas JS extra.
// Si en el futuro quieres ocultar/mostrar unidades, aqu¨ª puedes agregarlo.
function mostrarNombreMaestro(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedMaestro = selectedOption.textContent;
    document.getElementById('nombreMaestroSeleccionado').textContent = selectedMaestro;
}
</script>
@endsection
                            <style id="table_style">
                                @media print {
                        .no-print 
                            {
                                 display: none !important;
                            }
                      }
                            .artistic-btn 
                            {
                                background-color: black;
                                color: white;
                                font-weight: bold;
                                padding: 10px 20px;
                                border-radius: 5px;
                                cursor: pointer;
                                box-shadow: 0 2px 4px white;
                            }

                            .artistic-btn:hover 
                            {
                                background: linear-gradient(45deg, #B2B2B2, #B2B2B2);
                                color: black;
                                
                                
                            }
                            .form-control {
                                font-size: 16px;
                                border-radius: 10px;
                                border: 2px solid #ccc;
                                padding: 10px;
                                transition: border-color 0.3s ease;
                            }

                            .form-control:focus {
                                outline: none;
                                border-color: #6c63ff;
                            }
                            
                            .btn-primary {
                                background-color: #6c63ff;
                                border: none;
                                border-radius: 20px;
                                padding: 10px 20px;
                                font-size: 16px;
                                color: #fff;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                            }
                            
                            .btn-primary:hover {
                                background-color: #524bd4;
                            }
                            
                            .select2-container .select2-selection--single {
                                font-family: 'Century Gothic', sans-serif;
                                background-color: #ABE3FF; 
                                color: #fff;
                                font-size: 14px;
                            }
                            
                            .select2-container .select2-selection--single:hover {
                                font-family: 'Century Gothic', sans-serif;
                                background-color: white; 
                                color: blue;
                                font-size: 14px;
                            }



.filtros-busqueda {
    display: flex;
    flex-wrap: wrap;          /* permite que los selects bajen a otra línea */
    justify-content: center;  /* mantiene centrado */
    gap: 12px;                /* espacio entre selects */
    margin-bottom: 20px;      /* separación con la tabla */
}

.filtros-busqueda .select2-container {
    width: 170px !important;  /* ancho fijo de cada select */
    max-width: 100%;          /* se adapta si el espacio es reducido */
}

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
                            
                            .centered-select {
                                display: block;
                                margin: 0 auto;
                                text-align: center;
                            }
                                
    .futuristic-table {
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid rgba(59, 59, 59, 0.5);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 0 25px rgba(37, 37, 37, 0.444)
        
    }

     thead {
      background:rgba(255, 255, 255, 0.59);
      color: black;
      text-transform: uppercase;
    }

    th, 
     td {
         background: rgba(255, 255, 255, 0.59) !important;
      padding: 6px 8px;  
      border-bottom: 1px solid rgba(116, 116, 116, 0.5) !important;
      border-left: 1px solid rgba(116, 116, 116, 0.5);
      font-weight: bold !important;
    }
    tbody tr {
      background: rgb(255, 255, 255);
      transition: all 0.3s ease;
      font-weight: bold !important;
    }

     tbody td {
      color: #021a67;
      text-align: center;
    }

    .table:not(.table-sm):not(.table-md):not(.dataTable) td, .table:not(.table-sm):not(.table-md):not(.dataTable) th {
        padding: 0 10px;
        height: 60px;
        vertical-align: middle;
    }

                        </style>
                                            
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        <div class="pagination justify-content-end">
                            {!! $estudiantes->links() !!}
                        </div>  
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection
@endcan