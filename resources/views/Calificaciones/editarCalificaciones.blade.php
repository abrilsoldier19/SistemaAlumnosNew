@can('editar-rol')
@extends('layouts.app')

@section('content')
<section class="section">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <div class="section-header">
        <h3 class="page__heading">Editar Calificaciones</h3>
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

                        <!-- Form to update calificaciones -->
                        <form method="POST" action="{{ route('Calificaciones.actualizar', $calificacion->IdCalificacions) }}">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Display student information and grades -->
                            <div class="tabbable">
                                <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="calificacionesFinales-tab" data-toggle="tab" href="#calificacionesFinales" role="tab" aria-controls="calificacionesFinales" aria-selected="true">Calificaciones Finales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="calificacionesParciales-tab" data-toggle="tab" href="#calificacionesParciales" role="tab" aria-controls="calificacionesParciales" aria-selected="false">Calificaciones Parciales</a>                       </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="calificacionesFinales" role="tabpanel" aria-labelledby="calificacionesFinales-tab">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Materia</th>
                                                    <th>Grupo</th>
                                                    <th>Calificación Final</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($alumnosEnMateriaYGrupo as $alumno)
                                                    <tr>
                                                        <td>{{ $alumno->id }}</td>
                                                        <td>{{ $alumno->name }}</td>
                                                        <td>{{ $calificacion->materias->NombreMateria }}</td>
                                                        <td>{{ $calificacion->salon }}</td>
                                                         <td>
                                    <input type="number" 
                       name="Calificacion_Final[{{ $alumno->id }}]" 
                       class="form-control"
                       value="{{ old('calificacion_final.' . $alumno->id, $alumno->Calificacion_Final) }}" 
                       min="0" max="100">
                                </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="calificacionesParciales" role="tabpanel" aria-labelledby="calificacionesParciales-tab">
                                    <table class="table table-bordered table-sm">
                                        @php
    // This gets the first element of $unidadData, or an empty array if $unidadData is empty
    $firstData = !empty($unidadData) ? reset($unidadData) : [];
@endphp
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Nombre</th>
            <th rowspan="2">Materia</th>
            <th rowspan="2">Grupo</th>
            @if (!empty($firstData))
            <th colspan="{{ count($firstData) }}">Calificación Parcial</th>
        @else
            <th colspan="1">Calificación Parcial</th>
        @endif
        </tr>
        <tr>
            @if (!empty($unidadData))
                @foreach (reset($unidadData) as $data)
                    <th>{{ $data['NumeroUnidad'] }}</th>
                @endforeach
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnosEnMateriaYGrupo as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->name }}</td>
                <td>{{ $calificacion->materias->NombreMateria }}</td>
                <td>{{ $calificacion->salon }}</td>
                @if(isset($unidadData[$alumno->id]))
                    @foreach ($unidadData[$alumno->id] as $unidad)
                        <td>
                            <input 
                                type="number" 
                                id="Calificacion_Parcial_{{ $alumno->id }}_{{ $unidad['NumeroUnidad'] }}" 
                                name="Calificaciones[{{ $alumno->id }}][{{ $unidad['NumeroUnidad'] }}]" 
                                style="width: 80px;" 
                                class="form-control" 
                                value="{{ old('Calificaciones.' . $alumno->id . '.' . $unidad['NumeroUnidad'], $unidad['Calificacion_Parcial']) }}" 
                                placeholder="Calificación Unidad {{ $unidad['NumeroUnidad'] }}" 
                                step="0.00001" 
                                min="0" 
                                max="100"
                                required
                            >
                        </td>
                    @endforeach
                @else
                    @foreach(reset($unidadData) as $data)
                        <td>
                            <input 
                                type="number" 
                                style="width: 80px;" 
                                class="form-control" 
                                value="N/A" 
                                disabled
                            >
                        </td>
                    @endforeach
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Calificaciones</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
}
.btn-borrar {
    background-color: #7A0000;
    border: none;
    border-radius: 13px;
    font-size: 12px;
    color: #fff;
    width: 80px;
    cursor: pointer;
    font-family: Century Gothic, sans-serif;
    transition: background-color 0.3s ease;
}

.btn-borrar:hover {
    background-color: red !important;
    color: white !important;
    box-shadow: 0px 15px 20px rgba(207, 207, 207, 0.4);
    transform: translateY(-7px);
}
</style>
<!-- JavaScript para manejar la adición de unidades dinámicamente -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('update-calificaciones-form');

    // Function to send AJAX request
    function sendAjaxRequest(data) {
        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Optionally handle success
                alert('Calificaciones actualizadas con éxito.');
            } else {
                // Optionally handle errors
                alert('Error al actualizar calificaciones.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al actualizar calificaciones.');
        });
    }

    // Add event listener to form inputs
    form.addEventListener('change', function (event) {
        const formData = new FormData(form);
        const jsonData = {};
        formData.forEach((value, key) => {
            if (!jsonData[key]) {
                jsonData[key] = value;
            } else if (Array.isArray(jsonData[key])) {
                jsonData[key].push(value);
            } else {
                jsonData[key] = [jsonData[key], value];
            }
        });
        sendAjaxRequest(jsonData);
    });
});
</script>

@endsection
@endcan