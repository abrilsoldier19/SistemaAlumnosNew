@extends('layouts.app')

@section('content')
<section class="section">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <div class="section-header" style="display: flex; justify-content: center; align-items: center;">
        <h3 style="font-weight: bold; font-size: 40px; font-family: Century Gothic, sans-serif; color: #012EBF;">
            Calificaciones
        </h3>
    </div>

    <div class="card-body">
        <h4 align="center" style="font-family: Consolas, sans-serif;">
            Bienvenido {{ auth()->user()->name }} {{ auth()->user()->email }}
        </h4>
    </div>

    @if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Maestro'))
    <form action="{{ route('Calificaciones.index') }}" method="GET" class="filtros-card no-print">
        <div class="row g-3 align-items-end justify-content-center">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <select class="form-control filtro-input" name="salon">
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
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <select class="form-control filtro-input" name="turno">
                    <option value="">Turnos</option>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <select class="form-control filtro-input" name="Carrera" id="carrera">
                    <option value="">Carreras</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->IdCarreras }}" {{ $filtroCarrera == $carrera->IdCarreras ? 'selected' : '' }}>
                            {{ $carrera->NombreCarrera }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <select class="form-control select2" name="Alumno" id="Alumno">
                    <option value="">Todos los alumnos</option>
                    @foreach ($alumnos as $alumno)
                        @if ($alumno)
                            <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <select class="form-control filtro-input" name="Semestre">
                    <option value="">Semestres</option>
                    <option value="1er Semestre">1er Semestre</option>
                    <option value="2do Semestre">2do Semestre</option>
                    <option value="3er Semestre">3er Semestre</option>
                    <option value="4to Semestre">4to Semestre</option>
                    <option value="5to Semestre">5to Semestre</option>
                    <option value="6to Semestre">6to Semestre</option>
                </select>
            </div>

            <div class="col-lg-1 col-md-3 col-sm-6 d-grid">
                <button type="submit" class="btn btn-buscar"><i class="fas fa-search"></i>Buscar</button>
            </div>
        </div>
    </form>
    @endif

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-rol')
                        <a class="btn btn-success" href="{{ route('Calificaciones.create') }}">Nuevo</a>
                        @endcan

                        @php
                            $maxUnits = $calificacionesConUnidades->max(function ($item) {
                                return count(explode(', ', $item->NumeroUnidad));
                            });
                        @endphp
                        <div class="tabla-scroll">
                        <table class="table tabla-moderna mt-2" style="font-family: Century Gothic, sans-serif;">
                            <thead>
                                <th style="color:#fff;">Alumno</th>
                                <th class="col-materia" style="color:#fff;">Materia</th>
                                @if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Maestro'))
                                    <th style="color:#fff;">Comentarios</th>
                                @endif
                                @for ($i = 1; $i <= $maxUnits; $i++)
                                    <th>Unidad {{ $i }}</th>
                                @endfor
                                <th style="color:#fff;">Calificacion final</th>
                                <th style="color:#fff;">Semestre</th>
                                <th style="color:#fff;">Maestro</th>
                                <th style="color:#fff;">A&ntilde;o Semestre</th>
                                <th style="color:#fff;">Carrera</th>
                                <th style="color:#fff;">Horario</th>
                                <th style="color:#fff;">Salon</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>

                            <tbody>
                                @foreach ($calificaciones as $calificacion)
                                <tr>
                                    <td>{{ $calificacion->alumnos->name }}</td>
                                    <td class="col-materia">{{ $calificacion->materias->NombreMateria }}</td>

                                    @if (Auth::user()->hasRole('Maestro'))
                                    <td>
                                        <form action="{{ route('Calificaciones.agregarComentarios') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $calificacion->IdCalificacions }}">
                                            <textarea name="comentarios">{{ $calificacion->comentarios }}</textarea>
                                            <button type="submit" class="btn btn-dark">Guardar</button>
                                        </form>
                                    </td>
                                    @endif

                                    @if (Auth::user()->hasRole('Administrador'))
                                        <td>{{ $calificacion->comentarios }}</td>
                                    @endif

                                    @for ($i = 1; $i <= $maxUnits; $i++)
                                    <td>
                                        @foreach ($calificacionesConUnidades as $unidad)
                                            @if ($unidad->Materia_id == $calificacion->Materia_id && $unidad->Alumno_id == $calificacion->Alumno_id)
                                                @php
                                                    $unidadCant = explode(', ', $unidad->NumeroUnidad);
                                                    $unitGrades = explode(', ', $unidad->Calificacion_Parcial);
                                                @endphp
                                                @if (isset($unidadCant[$i - 1]))
                                                    {{ $unitGrades[$i - 1] }}<br>
                                                @else
                                                    N/A
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    @endfor

                                    <td>{{ $calificacion->Calificacion_Final }}</td>
                                    <td>{{ $calificacion->Semester }}</td>
                                    <td>{{ $calificacion->Maestro }}</td>
                                    <td>{{ $calificacion->ciclo_escolar }}</td>
                                    <td>{{ $calificacion->carreras->NombreCarrera }}</td>
                                    <td>{{ $calificacion->turno }}</td>
                                    <td>{{ $calificacion->salon }}</td>
                                    <td class="text-center align-middle">
    <div class="acciones-botones">

        @can('editar-rol')
            <a class="button-editar"
               href="{{ route('Calificaciones.edit', $calificacion->IdCalificacions) }}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        @endcan

        @can('borrar-rol')
            <form action="{{ route('Calificaciones.destroy', $calificacion->IdCalificacions) }}"
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
                        </div>

                        <div class="pagination justify-content-end">
                            {!! $calificaciones->links() !!}
                        </div>

                        <div class="mt-3">
                            @if (Auth::user()->hasRole('Alumno'))
                                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('FormatoAnexo14.index') }}'">
                                    Anexo 14
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            theme: "bootstrap4",
            width: '100%',
            allowClear: true,
            placeholder: 'Todos los alumnos'
        });
    });
</script>

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
        border-radius: 22px;
        padding: 25px;
        margin: 20px auto 30px auto;
        max-width: 1200px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
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
    color: white;
    transform: translateY(-2px);
}

.btn-buscar i{
    font-size: 14px;
}

    .select2-container {
        width: 100% !important;
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
.col-materia {
    min-width: 280px;
}


</style>
@endsection