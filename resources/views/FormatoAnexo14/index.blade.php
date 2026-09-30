@extends('layouts.app')

@section('content')
@can('crear-rol')

@php 
    $maxUnits = 0; 
    foreach ($formatos as $formato) { 
        $numUnits = count(explode(',', $formato->Calificacion_Parcial)); 
        if ($numUnits > $maxUnits) { 
            $maxUnits = $numUnits; 
        } 
    } 
    $totalColumns = 1 + $maxUnits + 1;
@endphp

<div class="anexo-scope">
    <div class="anexo-grid">
        
        <!-- Header -->
        <div class="anexo-card header-flex">
            <div class="header-title">
                <h1>Anexo 14 IND MATERIA</h1>
                <p>Formatos de registro y desempeño académico</p>
            </div>
            <div class="user-badge">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="user-info">
                    <p style="color: #64748b;">Bienvenido(a)</p>
                    <p style="font-weight: 700;">{{ auth()->user()->name }} <span style="font-weight: 400; color: #64748b;">({{ auth()->user()->email }})</span></p>
                </div>
            </div>
        </div>

        <!-- Indicaciones -->
        <div class="anexo-card">
            <div class="instruction-box">
                <div class="instruction-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div class="instruction-content">
                    <h2>Indicación para guardar el archivo:</h2>
                    <p>Al momento de imprimir tu reporte, guarda el archivo con el siguiente formato:</p>
                    <span class="file-badge">Nombre_Apellido_Matricula.pdf</span>
                </div>
            </div>
        </div>

        <!-- Tabla -->
        <div class="anexo-card">
            <div class="action-bar print-hidden">
                <div class="btn-group">
                    @can('crear-rol')
                        <a href="{{ route('FormatoAnexo14.create') }}" class="btn-registro-nuevo">
                            <i class="fa-solid fa-plus"></i> Nuevo Registro
                        </a>
                    @endcan
                    <button type="button" class="btn-imprimirTabla" onclick="printTable()">
                        <i class="fa-solid fa-print"></i> Imprimir tabla
                    </button>
                </div>
                @can('crear-rol')
                    <a href="{{ route('Archivos.index') }}" class="btn btn-dark">
                        <i class="fa-solid fa-upload"></i> Subir reportes
                    </a>
                @endcan
            </div>

            <div class="table-wrapper">
                <table id="tabla_datos" class="tabla-anexo">
                    <thead>
                        <tr>
                            <th colspan="{{ $totalColumns }}" class="th-main">ANEXO 14</th>
                        </tr>
                        <tr>
                            <th colspan="{{ $totalColumns }}" class="th-sub">FORMATO DE REGISTRO PARA DESEMPEÑO ACADÉMICO</th>
                        </tr>
                        <tr class="tr-meta">
                            <th>Semestre / Grupo / Carrera</th>
                            <td colspan="{{ $totalColumns - 1 }}">
                                @foreach ($formatos as $formato)
                                    {{ $formato->semestres->Semestre ?? '' }} - Grupo {{ $formato->Salon ?? '' }} - {{ $formato->carreras->NombreCarrera ?? '' }} ({{ $formato->Turno ?? '' }})
                                    @break
                                @endforeach
                            </td>
                        </tr>
                        <tr class="tr-meta">
                            <th>Nombre del estudiante</th>
                            <td colspan="{{ $totalColumns - 1 }}">{{ auth()->user()->name }}</td>
                        </tr>
                        <tr class="tr-cols">
                            <th style="text-align: left;">Asignaturas</th>
                            @for ($i = 1; $i <= $maxUnits; $i++)
                                <th>U{{ $i }}</th>
                            @endfor
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($formatos as $formato)
                            @php $calificaciones = array_map('trim', explode(',', $formato->Calificacion_Parcial)); @endphp
                            <tr>
                                <td>
                                    <div class="subject-flex">
                                        <span style="font-weight: 600;">{{ $formato->materias->NombreMateria ?? 'Sin Asignar' }}</span>
                                        <div class="print-hidden" style="display: flex; gap: 4px;">
                                            @can('editar-rol')
                                                <a href="{{ route('FormatoAnexo14.edit', $formato->IdFormato14) }}" class="btn-icon" title="Editar">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            @endcan
                                            @can('borrar-rol')
                                                <form action="{{ route('FormatoAnexo14.destroy', $formato->IdFormato14) }}" method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn-icon delete" onclick="return confirm('¿Eliminar registro?')" title="Eliminar">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </td>

                                @for ($i = 0; $i < $maxUnits; $i++)
                                    @php
                                        $val = $calificaciones[$i] ?? null;
                                        $cal = is_numeric($val) ? floatval($val) : null;
                                    @endphp
                                    <td style="font-weight: 700;">
                                        @if($cal !== null)
                                            <span style="{{ $cal < 70 ? 'color: #dc2626;' : '' }}">{{ $cal }}</span>
                                        @else
                                            <span style="color: #cbd5e1;">-</span>
                                        @endif
                                    </td>
                                @endfor

                                <td>
                                    <form action="{{ route('FormatoAnexo14.agregarComentarios') }}" method="POST" class="obs-form print-hidden">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $formato->IdFormato14 }}">
                                        <input type="text" name="observaciones" class="obs-input" placeholder="Añadir nota..." value="{{ $formato->observaciones ?? '' }}">
                                        <button type="submit" class="btn-save" title="Guardar">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $totalColumns }}" style="padding: 24px; color: #64748b;">
                                    No hay registros disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</section>
@endcan
@endsection
@section('scripts')
    <script>
        function printTable() {
            var table = document.getElementById("tabla_datos");
            var printWindow = document.createElement('iframe');
            printWindow.style.position = 'absolute';
            printWindow.style.top = '-10000px';
            printWindow.style.left = '-10000px';

            document.body.appendChild(printWindow);
            
            printWindow.contentDocument.write('<html><head><title>Anexo 14 - Reporte de Calificaciones</title>');
            printWindow.contentDocument.write('<script src="https://cdn.tailwindcss.com"><\/script>');
            printWindow.contentDocument.write(`
                <style>
                    @media print { 
                        .print\\:hidden { display: none !important; }
                        .print\\:block { display: block !important; }
                    } 
                    body { font-family: ui-sans-serif, system-ui, sans-serif; background-color: #ffffff; padding: 10px; }
                    table { width: 100%; border-collapse: collapse !important; }
                    th, td { border: 1px solid #cbd5e1 !important; }
                </style>
            `);
            printWindow.contentDocument.write('</head><body>');
            printWindow.contentDocument.write(table.outerHTML);
            printWindow.contentDocument.write('</body></html>');
            printWindow.contentDocument.close();
            
            setTimeout(function () {
                printWindow.contentWindow.focus();
                printWindow.contentWindow.print();
                document.body.removeChild(printWindow);
            }, 600);
        }
    </script>
@endsection

@section('css')
@vite(['resources/css/vistas/vista-index-formato14.css', 'resources/js/app.js'])
@endsection