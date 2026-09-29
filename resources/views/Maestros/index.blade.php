@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <div class="section-header">
      <h3 class="page__heading">Maestros</h3>
  </div>
      @if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Maestro'))
        <form id="filtroMaestros" action="{{ route('Maestros.index') }}" class="filtros-card" method="GET">
    <div class="contenedor-filtro-maestros">

        <div class="select-maestro-container">
            <select class="form-control select2" name="NombreMaestro" id="NombreMaestro">
                <option value="">Todos los maestros</option>
                @foreach ($maestros_nombre as $maestro)
                    <option value="{{ $maestro->NombreMaestro }}"
                        {{ request('NombreMaestro') == $maestro->NombreMaestro ? 'selected' : '' }}>
                        {{ $maestro->NombreMaestro }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-buscar">
            <i class="fas fa-search"></i>
            Buscar
        </button>

    </div>
</form>

      @endif
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                         @can('Administrador')                
                           <a class="btn btn-warning" href="{{ route('Maestros.create') }}">Nuevo</a>  <!--boton de nuevo        -->
                         @endcan

                            <table class="table tabla-moderna mt-2">
                              <thead style="background-color:#6777ef">                                     
                                  <th style="color:#fff;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">E-mail</th>
                                  <th style="color:#fff;">Carrera</th>
                                  @can('Administrador')
                                      <th style="color:#fff;">Acciones</th>        
                                  @endcan                                                           
                              </thead>
                              <tbody>
                                @foreach ($maestros as $maestro)
                                  <tr>
                                    <td style="color:##474347;">{{ $maestro->IdMaestros }}</td>
                                    <td>{{ $maestro->NombreMaestro }}</td>
                                    <td>{{ $maestro->Correos }}</td>
                                    <td>
                                      @php
                                        $ids = [];
                                        if ($maestro->maestroCarrera && $maestro->maestroCarrera->Carrera_id) {
                                          $ids = array_filter(array_map('trim', explode(',', $maestro->maestroCarrera->Carrera_id)));
                                        }
                                        
                                        $nombres = [];
                                        if (!empty($ids)) {
                                          $nombres = \App\Models\Carrera::whereIn('IdCarreras', $ids)
                                          ->pluck('NombreCarrera')->toArray();
                                        }
                                      @endphp
                                      {{ implode(', ', $nombres) }}
                                    </td>
                                    <td>       
                                    
                                    <div class="acciones-botones">

        @can('editar-rol')
            <a class="button-editar"
               href="{{ route('Maestros.edit', $maestro->IdMaestros) }}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        @endcan

        @can('borrar-rol')
            <form action="{{ route('Maestros.destroy', $maestro->IdMaestros) }}"
                  method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="button-borrar"
                        onclick="return confirm('¿Seguro que deseas borrar este registro?')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        @endcan

    </div>
                                    </td>
                                    
                                    
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $maestros->links() !!}
                          </div>        
                                           
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#NombreMaestro').select2();
    
                $('#NombreMaestro').on('change', function() {
                    $('#filtroMaestros').submit();
                });
            });
        </script>
    @endsection

<style>
    .form-row {
        margin-bottom: 10px;
    }

    .form-control {
        font-size: 16px;
        border-radius: 10px;
        border: 2px solid #ccc;
        padding: 10px;
        transition: border-color 0.3s ease;
        font-family: Century Gothic, sans-serif;
    }

    .form-control:focus {
        outline: none;
        border-color: #6c63ff;
        font-family: Century Gothic, sans-serif;
    }

    .btn-primary {
        background-color: #6c63ff;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
        font-family: Century Gothic, sans-serif;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #524bd4;
    }

    @media (max-width: 991px) {
        .form-row.justify-content-center {
            flex-wrap: wrap;
        }

        .form-row.justify-content-center .col-lg-2 {
            flex-basis: 48%;
        }
    }

    @media (max-width: 767px) {
        .form-row.justify-content-center .col-lg-2 {
            flex-basis: 100%;
        }
    }

    .select2-container--default .select2-selection--single {
        background-color: rgba(194, 194, 194, 0.30) !important;
        border: 2px rgb(11, 102, 206);
        border-radius: 12px;
        height: 45px;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: black;
        font-weight: 500;
        font-size: 16px;
        padding-left: 12px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        right: 10px;
        top: 10px;
    }

    .select2-container--default .select2-results__option {
        padding: 10px;
        font-size: 15px;
        cursor: pointer;
        background-color: rgb(214, 223, 238) !important;
        font-weight: bold;
        transition: all 0.7s ease;
    }

    .select2-container--default .select2-results__option--highlighted {
        background-color: rgb(136, 184, 238) !important;
        color: black !important;
    }

    .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: rgb(136, 184, 238) !important;
        color: black !important;
    }

    .select2-container--open .select2-dropdown {
        top: 100% !important;
        bottom: auto !important;
        color: rgb(0, 0, 0) !important;
        background-color: rgb(214, 223, 238) !important;
    }

    .filtros-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 15px 20px;
    margin: 15px auto;
    max-width: 700px;
    box-shadow: 0 4px 15px rgba(0,0,0,.08);
}

.contenedor-filtro-maestros{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
    margin: 15px 0;
}

.select-maestro-container{
    width:350px;
}

    .form-label {
        font-weight: 700;
        color: #012EBF;
        font-family: Century Gothic, sans-serif;
        margin-bottom: 6px;
    }

    .filtro-input,
    .select2-container--bootstrap4 .select2-selection {
        height: 48px !important;
        border-radius: 14px !important;
        border: 2px solid #d9d9d9 !important;
        font-size: 15px;
        font-family: Century Gothic, sans-serif;
    }

   
.btn-buscar{
    height:48px;
    min-width:120px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg,#012EBF,#6c63ff);
    color:white;
    font-weight:bold;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    box-shadow:0 6px 15px rgba(108,99,255,.35);
    transition:.3s;
}

.btn-buscar:hover{
    transform:translateY(-2px);
    color:white;
}

.select2-container{
    width:100% !important;
}

    .select2-dropdown {
        border-radius: 12px !important;
        overflow: hidden !important;
        z-index: 9999 !important;
    }

    .select2-results__options {
        max-height: 180px !important;
        overflow-y: auto !important;
    }

    .select2-container--bootstrap4 .select2-selection--single {
        height: 48px !important;
        border-radius: 14px !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--bootstrap4 .select2-selection__rendered {
        line-height: 48px !important;
        padding-left: 15px !important;
    }

    .select2-container--bootstrap4 .select2-selection__arrow {
        height: 48px !important;
    }

    .select2-results__option:first-child {
        display: none !important;
    }
    .tabla-scroll {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
/* TABLA */

.tabla-scroll {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    padding: 8px;
    -webkit-overflow-scrolling: touch;
}

.tabla-scroll table {
    min-width: 1400px;
}

.tabla-scroll::-webkit-scrollbar {
    height: 8px;
}

.tabla-scroll::-webkit-scrollbar-track {
    background: #ececec;
    border-radius: 10px;
}

.tabla-scroll::-webkit-scrollbar-thumb {
    background: #012EBF;
    border-radius: 10px;
}

.tabla-moderna {
    border-collapse: separate;
    border-spacing: 0;
    font-family: Century Gothic, sans-serif;
    border-radius: 14px;
    overflow: hidden;
}

.tabla-moderna thead th {
    background: #e7e8f5 !important;
    color: #111 !important;
    font-size: 14px;
    font-weight: 700;
    padding: 12px 16px;
    border: none;
    white-space: nowrap;
}

.tabla-moderna tbody td {
    font-size: 14px;
    padding: 10px 16px;
    border: none;
    vertical-align: middle;
}

.tabla-moderna tbody tr:nth-child(odd) {
    background: #ffffff;
}

.tabla-moderna tbody tr:nth-child(even) {
    background: #f4f4f8;
}

.tabla-moderna tbody tr:hover {
    background: #eef2ff;
}

/* BOTONES */

.acciones-botones {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.acciones-botones form {
    margin: 0;
}

.button-editar,
.button-borrar {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: none;
    border-radius: 50%;

    color: white;
    text-decoration: none;

    cursor: pointer;
    transition: all .3s ease;

    padding: 0;
}

.button-editar i,
.button-borrar i {
    font-size: 14px;
}

.button-editar {
    background: #1590d8;
}

.button-editar:hover {
    background: #0b5c89;
    color: white;
}

.button-borrar {
    background: #d81b3a;
}

.button-borrar:hover {
    background: #8d0f24;
    color: white;
}
</style>
@endsection
@endcan