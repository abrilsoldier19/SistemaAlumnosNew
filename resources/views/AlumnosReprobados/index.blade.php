@can('crear-rol')
@extends('layouts.app')

@section('content')

<section class="section">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

    <div class="section-header" style="display: flex; justify-content: center; align-items: center;">
        <h3 style="font-weight: bold; font-size: 40px; font-family: Century Gothic, sans-serif; color: #012EBF;">
            Alumnos Reprobados
        </h3>
    </div>

    <div class="card-body">
        <h4 align="center" style="font-family: Consolas, sans-serif;">
            Bienvenido {{ auth()->user()->name }} {{ auth()->user()->email }}
        </h4>
    </div>

    <form method="GET" action="{{ route('AlumnosReprobados.index') }}" class="filtros-card no-print">
        <div class="row g-3 align-items-end justify-content-center">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <select class="form-control filtro-input select2" name="carrera" id="carrera">
                    <option value="">Carreras</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->IdCarreras }}" {{ $filtroCarrera == $carrera->IdCarreras ? 'selected' : '' }}>
                            {{ $carrera->NombreCarrera }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12">
                <select class="form-control filtro-input select2" name="Semestre_id">
                    <option value="">Semestres</option>
                    <option value="1er Semestre">1er Semestre</option>
                    <option value="2do Semestre">2do Semestre</option>
                    <option value="3er Semestre">3er Semestre</option>
                    <option value="4to Semestre">4to Semestre</option>
                    <option value="5to Semestre">5to Semestre</option>
                    <option value="6to Semestre">6to Semestre</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12">
                <select class="form-control filtro-input select2" name="turno">
                    <option value="">Turnos</option>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12">
                <select class="form-control filtro-input select2" name="salon">
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

            <div class="col-lg-3 col-md-12 d-flex gap-2 justify-content-center">
                <button type="submit" class="btn-buscar">Mostrar</button>
                <button type="button" onclick="imprimirTabla()" class="btn-imprimir">
    Imprimir
</button>
            </div>
            

        </div>
    </form>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card tabla-card">
                    <div class="card-body">

                        @php
                            $maxUnits = 0;
                            foreach ($alumnoReprobados as $calificacionParcial) {
                                $numUnits = count(explode(', ', $calificacionParcial->NumeroUnidad));
                                if ($numUnits > $maxUnits) {
                                    $maxUnits = $numUnits;
                                }
                            }
                        @endphp

                        <div class="tabla-scroll">
                            <table id="tabla_datos" class="table tabla-moderna">
                                <thead>
                                    <tr>
                                        <th>Alumno</th>
                                        <th>Materia</th>

                                        @for ($i = 1; $i <= $maxUnits; $i++)
                                            <th>Unidad {{ $i }}</th>
                                        @endfor

                                        <th>Calificación final</th>
                                        <th>Maestro/a</th>
                                        <th>Semestre</th>
                                        <th>Año Semestre</th>
                                        <th>Carrera</th>
                                        <th>Turno</th>
                                        <th>Salón</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($alumnoReprobados as $alumnoReprobado)
                                        @php
                                            $unidades = explode(', ', $alumnoReprobado->NumeroUnidad);
                                            $calificaciones = explode(', ', $alumnoReprobado->Calificacion_Parcial);
                                        @endphp

                                        <tr>
                                            <td>{{ $alumnoReprobado->alumnos->name }}</td>
                                            <td>{{ $alumnoReprobado->materias->NombreMateria }}</td>

                                            @for ($i = 0; $i < $maxUnits; $i++)
                                                @if(isset($calificaciones[$i]) && floatval($calificaciones[$i]) < 70)
                                                    <td class="calificacion-reprobada">
                                                        {{ $calificaciones[$i] }}
                                                    </td>
                                                @elseif(isset($calificaciones[$i]))
                                                    <td class="calificacion-aprobada">
                                                        {{ $calificaciones[$i] }}
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                            @endfor

                                            <td>{{ $alumnoReprobado->Calificacion_Final }}</td>
                                            <td>{{ $alumnoReprobado->Maestro }}</td>
                                            <td>{{ $alumnoReprobado->Semester }}</td>
                                            <td>{{ $alumnoReprobado->ciclo_escolar }}</td>
                                            <td>{{ $alumnoReprobado->carreras->NombreCarrera }}</td>
                                            <td>{{ $alumnoReprobado->turno }}</td>
                                            <td>{{ $alumnoReprobado->salon }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination justify-content-end mt-3">
                            {!! $alumnoReprobados->links() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 enlaces-anexos">
        <button type="button" class="button-blue" onclick="window.location='{{ route('Formatos.index') }}'">
            Anexo 15 Casos Especiales 2021
        </button>
        <button type="button" class="button-blue" onclick="window.location='{{ route('FormatoAnexo19.index') }}'">
            Anexo 19 Reporte semestral
        </button>
        <button type="button" class="button-blue" onclick="window.location='{{ route('FormatoAnexo19Mensual.index') }}'">
            Anexo 19 Reporte mensual
        </button>
        <button type="button" class="button-blue" onclick="window.location='{{ route('Archivos.index') }}'">
            Reportes alumnos Anexo 14
        </button>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            width: '100%',
            placeholder: 'Seleccione una opción',
            allowClear: true
        });
    });

    

function imprimirTabla() {
    window.print();
}

</script>

<style id="table_style">
    .filtros-card {
        background: #ffffff;
        border-radius: 22px;
        padding: 22px;
        margin: 20px auto 30px auto;
        max-width: 1150px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .filtro-input,
    .select2-container .select2-selection--single {
        height: 45px !important;
        border-radius: 14px !important;
        border: 2px solid #d9d9d9 !important;
        font-size: 14px;
        font-family: Century Gothic, sans-serif;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-selection__rendered {
        line-height: 45px !important;
        padding-left: 14px !important;
        color: #111 !important;
        font-weight: 500;
    }

    .select2-selection__arrow {
        height: 45px !important;
    }

    .btn-buscar,
    .btn-imprimir,
    .button-blue {
        border: none;
        border-radius: 16px;
        padding: 10px 18px;
        font-size: 15px;
        color: #fff;
        cursor: pointer;
        font-family: Century Gothic, sans-serif;
        transition: all 0.3s ease;
        font-weight: bold;
        white-space: nowrap;
    }

    .btn-buscar {
        background: linear-gradient(135deg, #012EBF, #6c63ff);
        box-shadow: 0 6px 15px rgba(108, 99, 255, 0.30);
    }

    .btn-imprimir {
        background: #111;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.20);
    }

    .button-blue {
        background-color: #0087E2;
        margin: 5px;
    }

    .btn-buscar:hover,
    .btn-imprimir:hover,
    .button-blue:hover {
        transform: translateY(-2px);
        color: white;
    }

    .tabla-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
    }

    .tabla-scroll {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 10px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.75);
        -webkit-overflow-scrolling: touch;
    }

    .tabla-moderna {
        min-width: 1350px;
        border-collapse: separate;
        border-spacing: 0;
        font-family: Century Gothic, sans-serif;
        margin-bottom: 0;
    }

    .tabla-moderna thead th {
        background: #e9e9fb !important;
        color: #111 !important;
        font-weight: 800;
        padding: 12px 16px;
        border: none;
        font-size: 14px;
        white-space: nowrap;
    }

    .tabla-moderna tbody td {
        padding: 11px 16px;
        border: none;
        vertical-align: middle;
        color: #111;
        font-size: 14px;
        white-space: nowrap;
    }

    .tabla-moderna tbody tr {
        height: 54px;
    }

    .tabla-moderna tbody tr:nth-child(odd) {
        background: rgba(255, 255, 255, 0.85);
    }

    .tabla-moderna tbody tr:nth-child(even) {
        background: rgba(238, 236, 244, 0.85);
    }

    .tabla-moderna tbody tr:hover {
        background: rgba(220, 226, 255, 0.95);
    }

    .tabla-moderna thead th:first-child {
        border-top-left-radius: 14px;
    }

    .tabla-moderna thead th:last-child {
        border-top-right-radius: 14px;
    }

    .calificacion-reprobada {
        color: #CE1531 !important;
        font-weight: 800;
    }

    .calificacion-aprobada {
        color: #111 !important;
        font-weight: 700;
    }

    .tabla-scroll::-webkit-scrollbar {
        height: 10px;
    }

    .tabla-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .tabla-scroll::-webkit-scrollbar-thumb {
        background: #012EBF;
        border-radius: 10px;
    }

    .enlaces-anexos {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }

    
    @media print {
    body * {
        visibility: hidden !important;
    }

    #tabla_datos,
    #tabla_datos * {
        visibility: visible !important;
    }

    #tabla_datos {
        position: absolute;
        left: 0;
        top: 0;
        width: 100% !important;
        font-size: 8px !important;
        border-collapse: collapse !important;
    }

    #tabla_datos th,
    #tabla_datos td {
        border: 1px solid #999 !important;
        padding: 4px !important;
        text-align: center !important;
    }

    @page {
        size: landscape;
        margin: 10mm;
    }
}
</style>

@endsection
@endcan