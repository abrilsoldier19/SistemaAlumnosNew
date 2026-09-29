
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
     </div>
  </div>
  
</form>
<form>
<button id="btnPrint" onclick="printTable()">Imprimir tabla</button>
</form>
<form action="{{ route('FormatoAnexo19Mensual.index') }}" method="GET">
    <button type="submit">Mostrar</button>
    
    
</form>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                      @can('crear-rol')
                        <a class="btn btn-warning" href="{{ route('FormatoAnexo19Mensual.create') }}">Nuevo</a>                        
                        @endcan
                        <div>
                            
                             <form action="{{ route('FormatoAnexo19Mensual.guardarTabla') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filas" id="filas">
                                <button type="submit" class="btn btn-primary">Guardar datos</button>
                            </form>
                        </div>
                          @csrf
                          <table align="center" border="1" bgcolor=dddddd id="tabla_datos">
                            <tr style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px; border: 2px solid black;">
                                     <td colspan="7" align="center" bgcolor="666666"><font color="#FFFFFF"><strong>Reporte mensual del tutor</strong></font></td>
                                </tr>
                                <tr style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px; border: 2px solid black;">
                                    <td colspan="7" align="center" bgcolor="666666"><font color="#FFFFFF"><strong>Instituto Tecnológico: Superior de Monclova Ejercito Mexicano		</strong></font></td>
                                </tr>
                                <tr style="background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 17px;border: 2px solid black;">
                                    <td align="center"  style="background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 20px;border: 2px solid black;" colspan="1">Nombre del tutor:</td>
                                    @if($formatos) 
                                        <td colspan="4" align="center" style="background-color: gray; font-size: 18px; color:#fff; border: 2px solid black; width: 10px;">
                                            <select class = "no-print" style = "width:280px;"name="Maestro_id" onchange="mostrarNombreMaestro(this)">
                                                <option value="">Seleccione un maestro</option>
                                                @foreach ($maestros  as $maestro)
                                                    <option value="{{ $maestro->IdMaestros}}">{{ $maestro->NombreMaestro}}</option>
                                                @endforeach
                                            </select>
                                            <p id="nombreMaestroSeleccionado"></p>
                                    </td>
                                    <td  colspan="1" style="background-color: gray; color:#fff; height: 50px; width: 15%; border: 2px solid black;" > Fecha y hora: </td>
                                        <td colspan="1" style="background-color: gray; color:#fff; height: 50px; width: 100%; border: 2px solid black;" >
                                            {{$fechaActual->format('d/m/Y')}}
                                        </td>
                                    {!! $formatos->links() !!}
                                    @endif
                                </tr>
                                <tr style="background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 17px;border: 2px solid black; width: 10px;">
                                    <td align="center" style="background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 20px;border: 2px solid black;width: 100px;" colspan="1">Programa educativo:	</td>
                                    @if($formatos) 
                                        <td colspan="1" align="center" style="background-color: gray; font-size: 18px; color:#fff; border: 2px solid black; width: 10px;">
                                        <select class = "no-print" style="font-size: 16px; width: 210px" name="career" id="career" onchange="mostrarNombreCarrera(this)">
                                            <option value="">Seleccione una carrera</option>
                                                @foreach ($careers  as $career)
                                                    <option value="{{ $career->IdCarreras }}" {{ $filtroCarrera == $career->IdCarreras ? 'selected' : '' }}>{{ $career->NombreCarrera }}</option>
                                                @endforeach
                                        </select>
                                            <p id="nombreCarreraSeleccionada"></p>
                                    </td>
                                    <td colspan="3" style="background-color: gray; color:#fff; height: 50px; width: 100%; font-size: 16px; border: 2px solid black;" >
                                                        <label>Grupo y turno:</label>
                                                        <select  class = "no-print" name="salones" id="salones" onchange="fetchStudents()">
                                                            <option value="A">Salón A</option>
                                                            <option value="B">Salón B</option>
                                                            <option value="C">Salón C</option>
                                                            <option value="D">Salón D</option>
                                                            <option value="E">Salón E</option>
                                                            <option value="F">Salón F</option>
                                                            <option value="G">Salón G</option>
                                                            <option value="H">Salón H</option>
                                                        </select>
                                                        <select class = "no-print" name="turnos" id="turnos" onchange="fetchStudents()">
                                                            <option value="Matutino">Matutino</option>
                                                            <option value="Vespertino">Vespertino</option>
                                                        </select>
                                                        <label id="salon-turno-text" style=" color:#fff;"></label>
                                                    </td>
                                    <td style="background-color: gray; color:#fff; height: 50px; width: 15%; border: 2px solid black;" colspan="1" > Fecha y hora: </td>
                                    <td colspan="1" style="background-color: gray; color:#fff; height: 50px; width: 100%; border: 2px solid black;" >
                                            {{$fechaActual->format('h:i:s A')}}
                                        </td>
                                    {!! $formatos->links() !!}
                                    @endif
                                </tr>
                                <tr style="background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 17px;border: 2px solid black;">
                                    <td rowspan="2" colspan="1" style="background-color: gray; color:#fff; height: 50px; width: 15%; border: 2px solid black;">No.</td>
                                    <td rowspan="2" colspan="1" style="background-color: gray; color:#fff; height: 50px; width: 100%;border: 2px solid black;" > Lista de estudiantes</td>
                                    <td colspan="2"align="center" style="background-color: gray; color:#fff; height: 50px; width: 15%; border: 2px solid black;">Estudiantes atendidos del semestre</td>
                                    <td rowspan="2" colspan="1"align="center" style="background-color: gray; color:#fff; height: 50px; width: 15%; border: 2px solid black;">Estudiantes canalizados del semestre</td>
                                    <td rowspan="2" colspan="2"align="center" style="background-color: gray; color:#fff; height: 50px; width: 15%; border: 2px solid black;">	Area canalizada</td>
                                </tr>
                                <tr style="background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 22px; border: 2px solid black;">
                                    <th>I</th>
                                    <th>II</th>
                                </tr>
                                @foreach($formatos as $formato)
                                                    <tr>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 12%; border: 2px solid black; font-family: Century Gothic, sans-serif; font-size: 16px;" >
                                                            <li style="list-style: none;">{{$formato->alumnos->id}}</li>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 24.5%; border: 2px solid black; font-family: Century Gothic, sans-serif; font-size: 16px;" >
                                                            <li style="list-style: none;">{{$formato->alumnos->name}}</li>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 8.7%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id }}" class="auto-submit">
                                                            <input type="checkbox" name="checkpoint1" value="1" {{ $formato->checkpoint1 ? 'checked' : '' }}>
                                                            <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}">Guardar</button> 
                                                        </form>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 8.7%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id }}" class="auto-submit">
                                                            <input type="checkbox" name="checkpoint2" value="1" {{ $formato->checkpoint2 ? 'checked' : '' }}>
                                                            <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}">Guardar</button>
                                                        </form>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 13%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id }}" class="auto-submit">
                                                            <input type="checkbox" name="checkpoint3" value="1" {{ $formato->checkpoint3 ? 'checked' : '' }}>
                                                            <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}">Guardar</button>
                                                        </form>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 6%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="NombreAlumno" value="{{ $formato->NombreAlumno }}">
                                                            <input type="hidden" name="NombreMateria" value="{{ $formato->NombreMateria }}">
                                                            <input type="hidden" name="NombreCarrera" value="{{ $formato->NombreCarrera }}">
                                                            <input type="hidden" name="NombreMaestro" value="{{ $formato->NombreMaestro }}">
                                                            <input type="hidden" name="turno" value="{{ $formato->turno }}">
                                                            <input type="hidden" name="salon" value="{{ $formato->salon }}">
                                                            <textarea name="comentarios">{{$formato->comentarios}}</textarea>
                                                           <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}">Guardar</button>
                                                        </form>
                                                        </td>
                                                        <td class ="no-print" style="background-color: white; color:black; height: 70px;  width: 6%; border: 2px solid black;" >
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
                                            <table style ="display: none;" height="50px" width="100%">
                                                <tr  style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 16px;">
                                                    <td style="background-color: gray; color:#fff; height: 40px;  width: 7.2%; border: 2px solid black;" >No.</td>
                                                    <td style="background-color: gray; color:#fff; height: 60px;  width: 9%; border: 2px solid black;" >Lista de estudiantes</td>
                                                    <td colspan="2" style="background-color: gray; color:#fff; height: 60px;  width: 4%; border: 2px solid black;" >
                                                       <br> Estudiantes atendidos del semestre
                                                        <table style="font-size: 15px; margin: 1px;">
                                                        <br>
                                                           <tr>
                                                            <br>
                                                               <td style="width:50%; margin: 2px;">Tutoría Grupal</td>
                                                               <td style="width:50%; margin: 2px;">Tutoría Individual</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td style="background-color: gray; color:#fff; height: 50px;  width: 10%; border: 2px solid black;" >Estudiantes canalizados del semestre</td>
                                                    <td style="background-color: gray; color:#fff; height: 50px;  width: 10%; border: 2px solid black;" >Area canalizada</td>
                                                </tr>
                                            </table>
                                            <table style ="display: none;"height="50px" width="100%" id="studentsTable">
                                            @foreach($formatos as $formato)
                                                    <tr>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 12%; border: 2px solid black; font-family: Century Gothic, sans-serif; font-size: 16px;" >
                                                            <li style="list-style: none;">{{$formato->alumnos->id}}</li>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 24.5%; border: 2px solid black; font-family: Century Gothic, sans-serif; font-size: 16px;" >
                                                            <li style="list-style: none;">{{$formato->alumnos->name}}</li>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 8.7%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id }}" class="auto-submit">
                                                            <input type="checkbox" name="checkpoint1" value="1" {{ $formato->checkpoint1 ? 'checked' : '' }}>
                                                            <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}">Guardar</button> 
                                                        </form>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 8.7%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id }}" class="auto-submit">
                                                            <input type="checkbox" name="checkpoint2" value="1" {{ $formato->checkpoint2 ? 'checked' : '' }}>
                                                            <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}">Guardar</button>
                                                        </form>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 13%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Alumno_id" value="{{ $formato->Alumno_id }}" class="auto-submit">
                                                            <input type="checkbox" name="checkpoint3" value="1" {{ $formato->checkpoint3 ? 'checked' : '' }}>
                                                            <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.guardarCheckpoints') }}">Guardar</button>
                                                        </form>
                                                        </td>
                                                        <td style="background-color: white; color:black; height: 50px;  width: 6%; border: 2px solid black;" >
                                                        <form action="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="NombreAlumno" value="{{ $formato->NombreAlumno }}">
                                                            <input type="hidden" name="NombreMateria" value="{{ $formato->NombreMateria }}">
                                                            <input type="hidden" name="NombreCarrera" value="{{ $formato->NombreCarrera }}">
                                                            <input type="hidden" name="NombreMaestro" value="{{ $formato->NombreMaestro }}">
                                                            <input type="hidden" name="turno" value="{{ $formato->turno }}">
                                                            <input type="hidden" name="salon" value="{{ $formato->salon }}">
                                                            <textarea name="comentarios">{{$formato->comentarios}}</textarea>
                                                           <button type="submit" class="btn btn-warning no-print" href="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}">Guardar</button>
                                                        </form>
                                                        </td>
                                                        <td class ="no-print" style="background-color: white; color:black; height: 70px;  width: 6%; border: 2px solid black;" >
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
                                            <table style ="display: none;"class="table table-striped mt-2">
                                <tbody>
                                    @foreach ($formatos as $formato) {{--foreach a nivel de vista  --}}
                                    
                                    <tr>
                                    <td style="">{{$formato->alumnos->id}}
                                    <td style="">{{$formato->alumnos->name}}
                                        {{-- <td style="">{{\Illuminate\Support\Facades\Auth::user()->name}}</td> --}}
                                        <td>{{$formato->materias->NombreMateria}}</td>
                                        @if (Auth::user()->hasRole('Maestro'))
                                           <td> 
                                               <form action="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}" method="POST">
                                                   @csrf
                                                   <input type="hidden" name="id" value="{{ $formato->Alumno_id }}">
                                                   <textarea name="comentarios">{{$formato->comentarios}}</textarea>
                                                   <button type="submit" class="btn btn-warning" href="{{ route('FormatoAnexo19Mensual.agregarComentarios') }}">Guardar</button>
                                               </form>
                                           </td>
                                        @endif
                                        <td>{{$formato->Semestre}}</td>
                                        <td>{{$formato->NombreMaestro}}</td>
                                        <td style="display: ;">{{$formato->carreras->NombreCarrera}}</td>
                                        <td style="display: ;">{{$formato->turno}}</td>
                                        <td style="display: ;">{{$formato->salon}}</td>
                                        <td>{{$formato->comentarios}}</td>

                                        {{-- boton Editar --}}
                                        <td>  
                                        @if (Auth::user()->hasRole('Maestro'))
                                            @can('editar-rol') 
                                            <a class="btn btn-info" href="{{ route('FormatoAnexo19Mensual.edit', $formato->Alumno_id) }}">Editar</a>
                                            @endcan
                                            {{--boton borrar--}}
                                            @can('borrar-rol')
                                            {!! Form::open(['method' => 'DELETE','route' => ['FormatoAnexo19Mensual.destroy', $formato->Alumno_id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        {{-- y las tr son para las filas --}}
                                        @endif
                                        <td>
                                            @if (Auth::user()->hasRole('Maestro'))
                                            @can('editar-rol') 
                                            <a class="btn btn-info" href="{{ route('FormatoAnexo19Mensual.edit', $formato->Alumno_id) }}">Editar</a>
                                            @endcan
                                            {{--boton borrar--}}
                                            @can('borrar-rol')
                                            {!! Form::open(['method' => 'DELETE','route' => ['FormatoAnexo19Mensual.destroy', $formato->Alumno_id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        {{-- y las tr son para las filas --}}
                                        @endif
</td>
                                        
                                        </td>
                                        
                                @endforeach
                                </tbody>
                                </thead>
                            </table> 
                                        </td>
                                    </tr>
                            </table>
                        <div class="pagination justify-content-end">
                        {!! $formatos->links() !!}
                        </div>  
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
    </section>
   @section('scripts')
   <script type="text/javascript">
            function fetchStudents(fetchComments = true) {
    var salones = document.getElementById("salones").value;
    var turnos = document.getElementById("turnos").value;
    var table = document.getElementById("studentsTable");
    var rows = table.querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var salonTd = row.querySelector("td:nth-child(5)");
        var turnoTd = row.querySelector("td:nth-child(6)");
        if (salonTd.innerText == salones && turnoTd.innerText == turnos) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    }
    
    var salonTurnoText = document.getElementById("salon-turno-text");
    salonTurnoText.textContent = salones + "   " + turnos;
}
            

            function actualizarTablaAlumnos(alumnos, estudiantes)
            {
                const tabla = document.getElementById('studentsTable');
                let filas = '';

                alumnos.forEach((estudiante, index) =>
                {
                    filas += `
            <tr>
                <td style="background-color: gray; color:#fff; height: 50px;  width: 9%; border: 2px solid black; font-family: Century Gothic, sans-serif; font-size: 16px;">
                    <li style="list-style: none;">${estudiante.IdCalificacions}</li>
                </td>
                <td style="background-color: gray; color:#fff; height: 50px;  width: 18%; border: 2px solid black; font-family: Century Gothic, sans-serif; font-size: 16px;">
                    <li style="list-style: none;">${estudiantes[index].name}</li>
                </td>
                <td style="background-color: gray; color:#fff; height: 50px;  width: 6.5%; border: 2px solid black;" ></td>
                <td style="background-color: gray; color:#fff; height: 50px;  width: 6.5%; border: 2px solid black;" ></td>
                <td style="background-color: gray; color:#fff; height: 50px;  width: 10%; border: 2px solid black;" ></td>
                <td style="background-color: gray; color:#fff; height: 50px;  width: 10%; border: 2px solid black;" ></td>
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
                var table = document.getElementById("tabla_datos");

                var printWindow = document.createElement('iframe');
                printWindow.style.position = 'absolute';
                printWindow.style.top = '-10000px';
                printWindow.style.left = '-10000px';

                document.body.appendChild(printWindow);

                printWindow.contentDocument.write('<html><head><title>Imprimir tabla</title>');
                printWindow.contentDocument.write('</head><body>');
                printWindow.contentDocument.write('<style media="print">.no-print { display: none; }</style>');
                printWindow.contentDocument.write(table.outerHTML);
                printWindow.contentDocument.write('</body></html>');

                printWindow.contentWindow.print();

                setTimeout(function () 
                { 
                    document.body.removeChild(printWindow);
                }, 1000);
            }
            function mostrarNombreMaestro(selectElement) 
            {
                var nombreMaestroSeleccionado = document.getElementById("nombreMaestroSeleccionado");
                var nombreMaestro = selectElement.options[selectElement.selectedIndex].text;
                nombreMaestroSeleccionado.textContent = nombreMaestro;
            }
            function mostrarNombreCarrera(selectElement) 
            {
                var nombreCarreraSeleccionada = document.getElementById("nombreCarreraSeleccionada");
                var nombreCarrera = selectElement.options[selectElement.selectedIndex].text;
                nombreCarreraSeleccionada.textContent = nombreCarrera;
            }
   </script>
   <style>
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

