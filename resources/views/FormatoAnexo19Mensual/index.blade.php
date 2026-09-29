
@can('crear-rol')
@extends('layouts.app')

@section('content')
@php
    $fechaActual = now();
@endphp
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Anexo 19 Reporte mensual</h3>
      <div class="card-body">
        <h4>Bienvenido . {{ auth()->user()->name }} {{ auth()->user()->email }} </h4>
        @if (isset($fechaActual))
            <p>Fecha actual: {{ $fechaActual }}</p>
        @endif
        <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.easydropdown.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="themes/easydropdown.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" rel="stylesheet">

</head>
<style>
    .dropdown-container {
        display: flex;
        gap: 10px;
    }
</style>


     </div>
  </div>
  
    <div class="row">
        <div class="col-md-12">
            <button id="btnPrint" value="Print" onclick="printTable()" class="btn btn-dark">Imprimir tabla</button>
            <a class="btn btn-primary" href="{{ route('FormatoAnexo19Mensual.create') }}">Nuevo</a>
        </div>
    </div>
        <div class="col-lg-12" >
            @can('crear-rol')
                
                    @endcan
                    @csrf
                    <table class="table table-striped mt-2 modern-table"align="center" border="1" bgcolor=dddddd id="tabla_datos" style="width: 100%; min-width: 700px; max-width: 700px; margin: 0 auto; ">
                        <tr style="height:50px; width:100%; background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 24px; border: 2px solid #BABBC2;">
                            <td colspan="7" align="center" bgcolor="white"><font color="black"><strong>Reporte mensual del tutor</strong></font></td>
                        </tr>
                        <tr style="height:50px; width:100%; background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 24px; border: 2px solid #BABBC2;">
                            <td colspan="7" align="center"  bgcolor="white"><font color="black"><strong>Instituto Tecnológico: Superior de Monclova Ejercito Mexicano		</strong></font></td>
                        </tr>
                        <tr style="background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 17px;border: 2px solid #BABBC2;">
                            <td align="center"  style="background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 20px;border: 2px solid #BABBC2;" colspan="1">Nombre del tutor:</td>
                             @if($formatos) 
                                <td colspan="4" align="center" style="background-color: white; font-size: 18px; color: black; border: 2px solid #BABBC2; width: 10px;"> 
                                @if (Auth::user()->hasRole('Maestro'))
                                {{ auth()->user()->name }}
                                @endif
                                @can('Administrador-rol')
                                <div class="dropdown">
                                <form id="selectMaestroForm" action="{{ route('FormatoAnexo19Mensual.index') }}" method="GET">
                                    <select class="form-control no-print" style="font-size: 16px; width: 280px;" name="Maestro_id" onchange="mostrarNombreMaestro(this)"> Seleccione un maestro
                                      <option value="">Todos los maestros</option>
                                      @foreach ($maestros as $maestro)
                                            <option value="{{ $maestro->NombreMaestro }}">{{ $maestro->NombreMaestro }}</option>
                                    @endforeach
                                    </select>
                                    <div class="col-md-12 no-print">
                                        <button type="submit" class="btn btn-secondary">Filtrar</button>
                                    </div>
                                </form>

                                </div>

                                    <p id="nombreMaestroSeleccionado"> </p>
                                @endcan
                                </td>
                                <td  colspan="1" style="background-color: white; color: black; height: 50px; width: 15%; border: 2px solid #BABBC2;" > Fecha: </td>
                                    <td colspan="1" style="background-color: white; color: black; height: 50px; width: 100%; border: 2px solid #BABBC2;" >
                                        {{$fechaActual->format('d/m/Y')}}
                                    </td>
                                    {!! $formatos->links() !!}
                            @endif
                        </tr>
                        <tr style="background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 17px;border: 2px solid #BABBC2; width: 10px;">
                            <td align="center" style="background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 20px;border: 2px solid #BABBC2;width: 100px;" colspan="1">Programa educativo:	</td>
                                @if($formatos) 
                                    <td colspan="1" align="center" style="background-color: white; font-size: 18px; color: black; border: 2px solid #BABBC2; width: 10px;">
                                        <div class="dropdown">
                                        <form action="{{ route('FormatoAnexo19Mensual.index') }}" method="GET">
                                            <select class="form-control no-print" style="font-size: 16px; width: 210px" name="carrera" id="carrera" onchange="mostrarNombreCarrera(this)">
                                                <option value="">Todos los carreras</option>
                                                @foreach ($carreras as $carrera)
                                                    <option value="{{ $carrera->IdCarreras }}" {{ $filtroCarrera == $carrera->IdCarreras ? 'selected' : '' }}>{{ $carrera->NombreCarrera }}</option>
                                                @endforeach
                                            </select>
                                            <div class="col-md-12 no-print"><button type="submit" class="btn btn-secondary">Filtrar</button>
                                        </form>
                                        </div>

                                            <p id="nombreCarreraSeleccionada"></p>
                                    </td>
                                    <td colspan="3" style="background-color: white; color: black; height: 50px; width: 100%; font-size: 16px; border: 2px solid #BABBC2;" >
                                        <div class="dropdown-container">
                                        <form action="{{ route('FormatoAnexo19Mensual.index') }}" method="GET">
                                           <label >Grupo y turno:</label>
                                           <label id="salonTurnoSeleccionado"></label>
                                           <div class="row">
                                            <div class="col-md-4">
                                                <select class = "form-control no-print" style="font-size: 16px; width: 100px" name="salon"  onchange="mostrarSeleccionados(this)">
                                                    <option value="">Salones</option>
                                                    <option value="Salón A">Salón A</option>
                                                    <option value="Salón B">Salón B</option>
                                                    <option value="Salón C">Salón C</option>
                                                    <option value="Salón D">Salón D</option>
                                                    <option value="Salón E">Salón E</option>
                                                    <option value="Salón F">Salón F</option>
                                                    <option value="Salón G">Salón G</option>
                                                    <option value="Salón H">Salón H</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class = "form-control no-print" style="font-size: 16px; margin-right: auto;width: 110px" name="turno"  onchange="mostrarSeleccionados(this)">
                                                    <option value="Matutino">Turnos</option>
                                                    <option value="Matutino">Matutino</option>
                                                    <option value="Vespertino">Vespertino</option>
                                                </select>
                                            </div>
                                            <div align="center" class="col-md-4 no-print"><button type="submit" class="btn btn-secondary">Filtrar</button>
                                            </div>
                                        </form>
                                        </div>
                                    </td>
                                    <td style="background-color: white; color: black; height: 50px; width: 15%; border: 2px solid #BABBC2;" colspan="1" > Hora: </td>
                                    <td colspan="1" style="background-color: white; color: black; height: 50px; width: 100%; border: 2px solid #BABBC2;" >
                                            {{$fechaActual->format('h:i:s A')}}
                                        </td>
                                    {!! $formatos->links() !!}
                                @endif
                        </tr>
                        <tr style="background-color: white; color: black; font-family: Century Gothic, sans-serif; font-size: 17px;border: 2px solid #BABBC2;">
                            <td rowspan="2" colspan="1" style="background-color: white; color: black; height: 50px; width: 15%; border: 2px solid #BABBC2;">No.</td>
                            <td rowspan="2" colspan="1" style="background-color: white; color: black; height: 50px; width: 100%;border: 2px solid #BABBC2;" > Lista de estudiantes</td>
                            <td colspan="2"align="center" style="background-color: white; color: black; height: 50px; width: 15%; border: 2px solid #BABBC2;">Estudiantes atendidos del semestre</td>
                            <td rowspan="2" colspan="1"align="center" style="background-color: white; color: black; height: 50px; width: 15%; border: 2px solid #BABBC2;">Estudiantes canalizados del semestre</td>
                            <td rowspan="2" colspan="2"align="center" style="background-color: white; color: black; height: 50px; width: 15%; border: 2px solid #BABBC2;">	Area canalizada</td>
                        </tr>
                        <tr style="background-color: #F2F2F2; color: black; font-family: Century Gothic, sans-serif; font-size: 17px; border: 2px solid #BABBC2;">
                            <th style="background-color: #F2F2F2; color: black; font-family: Century Gothic, sans-serif; border: 2px solid #BABBC2;">Tutoría Grupal</th>
                            <th style="background-color: #F2F2F2; color: black; font-family: Century Gothic, sans-serif; border: 2px solid #BABBC2;">Tutoría Individual</th>
                        </tr>
                        @foreach($formatos as $formato)
                        
                            <tr>
                                
                                <td style="background-color: white; color:black; height: 50px;  width: 12%; border: 2px solid #BABBC2; font-family: Century Gothic, sans-serif; font-size: 16px;" >
                                    <li style="list-style: none;">{{$formato->Alumno_id }}</li>
                                </td>
                                <td style="background-color: white; color:black; height: 50px;  width: 24.5%; border: 2px solid #BABBC2; font-family: Century Gothic, sans-serif; font-size: 16px;" >
                                    <li style="list-style: none;">{{$formato->alumnos->name }}</li>
                                </td>
                                <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id   }}" class="auto-submit">
                                    <td style="background-color: white; color:black; height: 50px;  width: 8.7%; border: 2px solid #BABBC2;" >
                                        <input type="checkbox" name="checkpoint1" value="1" {{ $formato->checkpoint1 ? 'checked' : '' }}>
                                        <button type="submit" class="btn btn-dark no-print">Guardar</button> 
                                    </td>
                                    <td style="background-color: white; color:black; height: 50px;  width: 8.7%; border: 2px solid #BABBC2;" >
                                        <input type="checkbox" name="checkpoint2" value="1" {{ $formato->checkpoint2 ? 'checked' : '' }}>
                                        <button type="submit" class="btn btn-dark no-print">Guardar</button>
                                    </td>
                                    <td style="background-color: white; color:black; height: 50px;  width: 13%; border: 2px solid #BABBC2;" >
                                        <input type="checkbox" name="checkpoint3" value="1" {{ $formato->checkpoint3 ? 'checked' : '' }}>
                                        <button type="submit" class="btn btn-dark no-print">Guardar</button>
                                    </td>
                                </form>
                                <td style="background-color: white; color:black; height: 50px;  width: 6%; border: 2px solid #BABBC2;" >
                                    <form action="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $formato->Alumno_id}}">
                                        <textarea name="comentarios">{{$formato->comentarios}}</textarea>
                                        <button type="submit" class="btn btn-success no-print" href="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}">Guardar</button>
                                    </form>
                                </td>
                                
                                <td class ="no-print" style="background-color: white; color:black; height: 70px;  width: 6%; border: 2px solid #BABBC2;" >
                                    @if (Auth::user()->hasRole('Maestro'))
                                        @can('editar-rol') 
                                            <a class="btn btn-info no-print" href="{{ route('FormatoAnexo19Mensual.edit', $formato->Alumno_id) }}">Editar</a>
                                        @endcan
                                    {{--boton borrar--}}
                                        @can('borrar-rol')
                                            {!! Form::open(['method' => 'DELETE','route' => ['FormatoAnexo19Mensual.destroy', $formato->Alumno_id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger no-print']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                        {{-- y las tr son para las filas --}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                <div class="pagination justify-content-end">
                    {!! $formatos->links() !!}
                </div>  
          </div>
        </div>
    </section>
   @section('scripts')
   <script type="text/javascript">

            function actualizarTablaAlumnos(alumnos, estudiantes)
            {
                const tabla = document.getElementById('studentsTable');
                let filas = '';

                alumnos.forEach((estudiante, index) =>
                {
                    filas += `
            <tr>
                <td style="background-color: white; color: black; height: 50px;  width: 9%; border: 2px solid #BABBC2; font-family: Century Gothic, sans-serif; font-size: 16px;">
                    <li style="list-style: none;">${estudiante.IdCalificacions}</li>
                </td>
                <td style="background-color: white; color: black; height: 50px;  width: 18%; border: 2px solid #BABBC2; font-family: Century Gothic, sans-serif; font-size: 16px;">
                    <li style="list-style: none;">${estudiantes[index].name}</li>
                </td>
                <td style="background-color: white; color: black; height: 50px;  width: 6.5%; border: 2px solid #BABBC2;" ></td>
                <td style="background-color: white; color: black; height: 50px;  width: 6.5%; border: 2px solid #BABBC2;" ></td>
                <td style="background-color: white; color: black; height: 50px;  width: 10%; border: 2px solid #BABBC2;" ></td>
                <td style="background-color: white; color: black; height: 50px;  width: 10%; border: 2px solid #BABBC2;" ></td>
            </tr>`;
                });

                const textareas = document.querySelectorAll('[data-id]');
                textareas.forEach(textarea => 
                {
                    textarea.addEventListener('blur', saveComment);
                });
                tabla.innerHTML = filas;

            }
                function saveComment(alumnoId) 
                {
                    const comment = document.getElementById('comment_' + alumnoId).value;

                    $.ajax
                    ({
                         url: "{{ route('FormatoAnexo19Mensual.agregarComentarios') }}",
                        type: 'POST',
                        data: 
                        {
                             _token: "{{ csrf_token() }}",
                            alumno_id: alumnoId,
                            observaciones: comment
                        },
                        success: function (response) 
                        {
                            alert('Comentario guardado exitosamente.');
                        },
                        error: function (xhr, status, error) 
                        {
                            console.error(xhr, status, error);
                            alert('Ocurrió un error al guardar el comentario.');
                        }
                    });
                }
            const forms = document.querySelectorAll('.auto-submit');

            forms.forEach((form) => 
            {
                const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach((checkbox) =>
                {
                    checkbox.addEventListener('change', () =>
                    {
                        form.submit();
                    });
                });
            });

            //funcion para imprimir la tabla
            function printTable()
            {
                setTimeout(function () 
                { 
                    document.body.removeChild(printWindow);
                }, 1000);

                var printWindow = window.open('', '', 'height=600,width=800');
    
                printWindow.document.write('<style type="text/css">');
                //printWindow.document.write('<style media="print">.no-print { display: none; }</style>');
                printWindow.document.write(document.getElementById("table_style").innerHTML); // Agregar estilos
                printWindow.document.write('</style></head><body>');

                var table = document.getElementById("tabla_datos").outerHTML; // Obtener el HTML de la tabla
            
                printWindow.document.write(table);

                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
            function mostrarNombreMaestro(selectElement) 
            {
                var nombreMaestroSeleccionado = document.getElementById("nombreMaestroSeleccionado");
                var nombreMaestro = selectElement.options[selectElement.selectedIndex].text;
                nombreMaestroSeleccionado.textContent = nombreMaestro;

                const isAdmin = {!! json_encode(Auth::user()->hasRole('admin')) !!};

        if (isAdmin) {
            // Show the select element for admins
            $('#selectMaestro').show();
        } else {
            // Hide the select element for non-admin users (e.g., students)
            $('#selectMaestro').hide();
        }
            }
            function mostrarNombreCarrera(selectElement) 
            {
                var nombreCarreraSeleccionada = document.getElementById("nombreCarreraSeleccionada");
                var nombreCarrera = selectElement.options[selectElement.selectedIndex].text;
                nombreCarreraSeleccionada.textContent = nombreCarrera;
            }

            function mostrarSeleccionados(selectElement) 
            {
                var salonElement = document.getElementsByName("salon")[0];
                var turnoElement = document.getElementsByName("turno")[0];
                var selectedInfo = document.getElementById("salonTurnoSeleccionado");

                var salonSeleccionado = salonElement.options[salonElement.selectedIndex].text;
                var turnoSeleccionado = turnoElement.options[turnoElement.selectedIndex].text;
                salonTurnoSeleccionado.innerHTML = salonSeleccionado + " " + turnoSeleccionado;
            }

            function applyMaestroFilter() {
        document.getElementById('selectMaestroForm').submit();
    }
   </script>
   <style id="table_style">
         @media print {
                        .no-print 
                            {
                                 display: none !important;
                            }
                      }
                      
    </style>
   @endsection
@endsection
@endcan

