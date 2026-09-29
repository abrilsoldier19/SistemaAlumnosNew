
@can('crear-rol')

@extends('layouts.app')

@section('content')

<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Anexo 14 IND MATERIA</h3>
      <div class="card-body">
        <h4>Bienvenido . {{ auth()->user()->name }} {{ auth()->user()->email }} </h4>
     </div>
  </div>
<form>
<button id="btnPrint" onclick="printTable()">Imprimir tabla</button>
</form>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        @can('crear-rol')
                        <div>
                             <form action="{{ route('FormatoAnexo14.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filas" id="filas">
                                <button type="submit" class="btn btn-btn btn-dark " formaction="{{ route('FormatoAnexo14.create') }}">Guardar info</button>
                            </form>
                        </div>
                                              
                        @endcan
                        <div>
                             <form action="{{ route('FormatoAnexo14.guardarTabla') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filas" id="filas">
                                <button type="submit" class="btn btn-btn btn-dark" formaction="{{ route('FormatoAnexo14.guardarTabla') }}">Guardar tabla</button>
                            </form>
                        </div>
                        <form action="{{ route('FormatoAnexo14.index') }}" method="GET">
                                                    <select name="carrera_id">
                                                         <option value="">Seleccione una carrera</option>
                                                         @foreach ($carreras as $carrera)
                                                            <option value="{{ $carrera->IdCarreras }}">{{ $carrera->NombreCarrera}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select name="Semestre_id">
                                                        <option value="">Seleccione un semestre</option>
                                                        @foreach ($semestres as $semestre)
                                                            <option value="{{ $semestre->IdSemestres }}">{{ $semestre->Semestre}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit">Mostrar</button>
                                                </form>
                        
                          @csrf
                            <table id="tabla_datos" class="table table-striped mt-2">
                                <thead style="background-color:#6777ef"> 
                                    <tr>
                                        <td rowspan="2" > 
                                            <table class="table table-striped mt-2">
                                                
                                                @if ($materias->count() > 0)
                                                <table height="50px" width="100%" style="border: 2px solid black;">
                                                        <tr  style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px;">
                                                            <td style="background-color: gray; color:#fff; height: 50px;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 30%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 20%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" >Anexo14</td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" ></td>
                                                        </tr>
                                                    </table>
                                                    <table height="50px" width="100%" style="border: 2px solid black;">
                                                        <tr  style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px;">
                                                            <td style="background-color: gray; color:#fff; height: 50px;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 20%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" >FORMATO DE REGISTRO PARA DESEMPEÑO ACADÉMICO</td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" ></td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;" ></td>
                                                        </tr>
                                                    </table>
                                                    <table height="50px" width="100%" style="border: 2px solid black;">
                                                        <tr  style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px;">
                                                            <td style="background-color: gray; color:#fff; height: 70px;width: 27.5%;" >Semestre</td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;border: 2px solid black;" >4° "A" DE  INGENIERIA ELECTRÓNICA TURNO MATUTINO</td>
                                                    </table>
                                                    <table height="50px" width="100%" style="border: 2px solid black;">
                                                        <tr  style="height:50px; width:100%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px;">
                                                            <td style="background-color: gray; color:#fff; height: 50px;width: 27.5%;" >Nombre del estudiante</td>
                                                            <td style="background-color: gray; color:#fff; height: 50px; width: 100%;border: 2px solid black;" >mejia</td>
                                                    </table>
                                                    <table height="50px" width="100%" style="border: 2px solid black;">
                                                        <tr  style="height:50px; width:90%; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 24px;">
                                                            <td style="background-color: gray; color:#fff; height: 50px;width: 27.5%;" >Asignaturas</td>
                                                            <td style="background-color: gray; color:#fff; height: 50px;  width: 30px; border: 2px solid black;" >
                                                               <br> Temas
                                                                <table style="font-size: 15px; margin: 1px;">
                                                                    <tr>
                                                                            <td style="width:50%; margin: 2px;">I</td>
                                                                            <td style="width:50%; margin: 2px;">II</td>
                                                                            <td style="width:50%; margin: 2px;">III</td>
                                                                            <td style="width:50%; margin: 2px;">IV</td>
                                                                            <td style="width:50%; margin: 2px;">V</td>
                                                                            <td style="width:50%; margin: 2px;">VI</td>
                                                                            <td style="width:50%; margin: 2px;">VII</td>
                                                                            <td style="width:50%; margin: 2px;">VIII</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="background-color: gray; color:#fff; height: 50px;width: 27.5%;" >Observaciones</td>
                                                    </table>
                                                    <table>
                                                        <tbody>
                                                            @foreach ($materias as $index => $materia)
                                                                @if (isset($subjects[$index]) && isset($calificaciones[$index]))
                                                                    <tr style="height:50px; width: 100px; background-color: gray; color:#fff; font-family: Century Gothic, sans-serif; font-size: 15px;">
                                                                        <td style="background-color: #fff; color:black; width: 400px; ">  {{ $subjects[$index]->NombreMateria }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 110px; text-align: center;">  {{ $calificaciones[$index]->U1 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U2 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U3 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U4 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U5 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U6 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U7 }}</td>
                                                                        <td style="background-color: #fff; color:black; width: 105px; text-align: center;">{{ $calificaciones[$index]->U8 }}</td>
                        
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif
                                                
                                               
                                            </table>
                                            @section('scripts')
                                            <script>
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
                printWindow.contentDocument.write(table.outerHTML);
                printWindow.contentDocument.write('</body></html>');

                printWindow.contentWindow.print();

                setTimeout(function () 
                { 
                    document.body.removeChild(printWindow);
                }, 1000);
            }
    function guardarComentarios(alumnoId) {
        var comentarios = document.getElementById('comentarios_' + alumnoId).value;

        // Realiza una petición AJAX para guardar los comentarios en el backend
        // Puedes utilizar jQuery o la librería nativa fetch() para realizar la petición

        // Ejemplo con jQuery:
        $.ajax({
            method: 'POST',
            url: '/FormatoAnexo14/agregarComentarios',
            data: {
                alumno_id: alumnoId,
                comentarios: comentarios
            },
            success: function(response) {
                alert('Comentarios guardados exitosamente');
            },
            error: function(error) {
                alert('Error al guardar los comentarios');
            }
        });
    }
</script>
                                            </script>
                                            @endsection
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
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
@endsection
@endcan