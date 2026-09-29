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
  <form action="{{ route('Formatos.filtrar') }}" method="GET">
    <div class="row">
        <div class="col-lg-3">
            <input type="text" name="Alumno" class="form-control" placeholder="Buscar por alumno">
        </div>
        <div class="col-lg-3">
            <input type="text" name="Semestre" class="form-control" placeholder="Buscar por semestre">
        </div>
        <div class="col-lg-3">
            <input type="text" name="Carrera" class="form-control" placeholder="Buscar por carrera">
        </div>
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>
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
                             <form action="{{ route('Formatos.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filas" id="filas">
                                <button type="submit" class="btn btn-btn btn-dark " formaction="{{ route('Formatos.create') }}">Guardar info</button>
                            </form>
                        </div>
                                              
                        @endcan
                        <div>
                             <form action="{{ route('Formatos.guardarTabla') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filas" id="filas">
                                <button type="submit" class="btn btn-btn btn-dark" formaction="{{ route('Formatos.guardarTabla') }}">Guardar tabla</button>
                            </form>
                        </div>
                        
                          @csrf
                            <table id="tabla_datos" class="table table-striped mt-2">
                                <thead style="background-color:#6777ef"> 
                                    <tr>
                                        <td rowspan="2" > 
                                        @foreach ($formatos as $formato)
                                            <table>
                                            <form action="{{ route('Formatos.guardarAsignaturas')}}" method="POST">
                                                @csrf
                                                @php
                                                $firstFormato = $formatos->first();
                                                @endphp
                                                <tr>
                                                <td style="background-color: gray; color:#fff;"> Asignatura</td>
                                                    
                                                    <td style="background-color:gray; color:#black;">
                                                        <label for="asignatura1"></label>
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura1" rows="1.5" cols="10">{{$firstFormato->asignatura1}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <label for="asignatura2"></label>
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura2" rows="1.5" cols="10">{{$firstFormato->asignatura2}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <label for="asignatura3"></label>
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura3" rows="1.5" cols="10">{{$firstFormato->asignatura3}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura4" rows="1.5" cols="10">{{$firstFormato->asignatura4}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura5" rows="1.5" cols="10">{{$firstFormato->asignatura5}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura6" rows="1.5" cols="10">{{$firstFormato->asignatura6}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura7" rows="1.5" cols="10">{{$firstFormato->asignatura7}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura1" rows="1.5" cols="10">{{$firstFormato->asignatura1}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura5" rows="1.5" cols="10">{{$firstFormato->asignatura5}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura6" rows="1.5" cols="10">{{$firstFormato->asignatura6}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura7" rows="1.5" cols="10">{{$firstFormato->asignatura7}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <textarea style="background-color:gray; color:white; border-color: gray;" type="hidden" name="asignatura1" rows="1.5" cols="10">{{$firstFormato->asignatura1}}</textarea>
                                                    </td>
                                                    <td style="background-color:gray; color:#black;">
                                                        <button type="submit" class="btn btn-warning" formaction="{{ route('Formatos.guardarAsignaturas') }}">Guardar</button>
                                                    </td>
                                                </tr>
                                            </form>
                                            @endforeach
                                            
                                            @foreach ($formatos as $formato)
                                            <tr>
                                                    <form action="{{ route('Formatos.actualizarUnidades')}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <td style="background-color: gray; color:#fff;"> Unidades</td>
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades1">Unidad</label>
                                                        <select name="unidades1" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades1 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades1 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades1 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades1 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades1 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades1 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades1 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades1 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades1 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades1 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades1 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades1 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades2">Unidad</label>
                                                        <select name="unidades2" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades2 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades2 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades2 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades2 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades2 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades2 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades2 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades2 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades2 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades2 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades2 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades2 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades3">Unidad</label>
                                                        <select name="unidades3" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades3 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades3 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades3 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades3 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades3 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades3 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades3 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades3 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades3 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades3 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades3 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades3 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades4">Unidad</label>
                                                        <select name="unidades4" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades4 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades4 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades4 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades4 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades4 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades4 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades4 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades4 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades4 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades4 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades4 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades4 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades5">Unidad</label>
                                                        <select name="unidades5" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades5 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades5 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades5 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades5 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades5 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades5 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades5 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades5 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades5 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades5 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades5 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades5 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades6">Unidad</label>
                                                        <select name="unidades6" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades6 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades6 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades6 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades6 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades6 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades6 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades6 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades6 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades6 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades6 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades6 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades6 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidades7">Unidad</label>
                                                        <select name="unidades7" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidades7 == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidades7 == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidades7 == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidades7 == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidades7 == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidades7 == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidades7 == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidades7 == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidades7 == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidades7 == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidades7 == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidades7 == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;"> Observaciones</td> 
                                                    <td style="background-color: gray; color:#fff;"> Agregar comentarios</td> 
                                                    <td style="background-color: gray; color:#fff;"> Acciones</td> 
                                                    <input type="hidden" name="id" value="{{ $formato->IdFormatos}}">
                                                    <td><button type="submit" class="btn btn-warning" formaction="{{ route('Formatos.actualizarUnidades') }}">Guardar unidad</button></td>
                                                  </form>
                                                </tr>
                                            @endforeach
                                                
                                                
                                                @foreach ($formatos as $index => $formato)
                                                <tr>
                                                <form action="{{ route('Formatos.store') }}" method="POST">
                                                @csrf
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="text" name="nombre{{$index}}" rows="2.5" cols="10">{{$formato->nombre}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_1{{$index}}" rows="1.5" cols="10">{{$formato->calif_1}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_2{{$index}}" rows="1.5" cols="10">{{$formato->calif_2}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_3{{$index}}" rows="1.5" cols="10">{{$formato->calif_3}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_4{{$index}}" rows="1.5" cols="10">{{$formato->calif_4}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_5{{$index}}" rows="1.5" cols="10">{{$formato->calif_5}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_6{{$index}}" rows="1.5" cols="10">{{$formato->calif_6}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_7{{$index}}" rows="1.5" cols="10">{{$formato->calif_7}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_8{{$index}}" rows="1.5" cols="10">{{$formato->calif_8}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_9{{$index}}" rows="1.5" cols="10">{{$formato->calif_9}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_10{{$index}}" rows="1.5" cols="10">{{$formato->calif_10}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_11{{$index}}" rows="1.5" cols="10">{{$formato->calif_11}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="calif_12{{$index}}" rows="1.5" cols="10">{{$formato->calif_12}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;">{{ $formato->observaciones}}</td>
                                                    @if (Auth::user()->hasRole('Maestro'))
                                                    <td style="background-color: #fff; color:black;"> 
                                                        <form action="{{ route('Formatos.agregarComentarios') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $formato->IdFormatos}}">
                                                            <textarea name="observaciones">{{$formato->observaciones}}</textarea>
                                                            <button type="submit" class="btn btn-warning" href="{{ route('Formatos.agregarComentarios') }}">Guardar comentarios</button> 
                                                        </form>
                                                    </td>
                                                    @endif
                                                    {{-- boton Editar --}}
                                                    <td style="background-color: #fff; color:black;">  
                                                         @can('editar-rol') 
                                                         <a class="btn btn-info" href="{{ route('Formatos.edit', $formato->IdFormatos) }}">Editar</a>
                                                         @endcan
                                                         {{--boton borrar--}}
                                                         @can('borrar-rol')
                                                         {!! Form::open(['method' => 'DELETE','route' => ['Formatos.destroy', $formato->IdFormatos],'style'=>'display:inline']) !!}
                                                         {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                         {!! Form::close() !!}
                                                         @endcan
                                                    </td>
                                                    <td style="background-color: #fff; color:black;"> 
                                                            <button type="submit" class="btn btn-dark" href="{{ route('Formatos.store') }}">Guardar filas</button> 
                                                        
                                                    </td>
                                                </form>
                                                <form method="POST" action="{{ route('Formatos.agregarFilas') }}">
    @csrf
    <input type="text" name="nombre" id="nombre" style="width: 100px;"required>
    @error('nombre')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <input type="number" name="calif_1" id="calif_1" size="30" style="width: 100px;" required>
    <input type="number" name="calif_2" id="calif_2" size="30" style="width: 100px;"required>
    <input type="number" name="calif_3" id="calif_3" size="30" style="width: 100px;"required>
    <input type="number" name="calif_4" id="calif_4" size="30" style="width: 100px;"required>
    <input type="number" name="calif_5" id="calif_5" size="30" style="width: 100px;"required>
    <input type="number" name="calif_6" id="calif_6" size="30"style="width: 100px;"required>
    <input type="number" name="calif_7" id="calif_7" size="30"style="width: 100px;"required>
    <textarea name="observaciones" id="observaciones" cols="20" rows="1"></textarea>
    <button type="submit">Agregar fila</button>
</form>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                                                </tr>
<                                               </td>
                                                @endforeach
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
                        <button id="agregarFila" type="button" class="btn btn-dark">Agregar fila</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection
@endcan