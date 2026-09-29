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
    <button class="btn btn-btn btn-dark " onclick="window.print()">Imprimir tabla</button>
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
                            <table id ="tabla-formatos" class="table table-striped mt-2">
                                <thead style="background-color:#6777ef"> 
                                    <tr>
                                        <td rowspan="2" > 
                                            <table>
                                            @foreach ($formatos as $formato)
                                            <form action="{{ route('Formatos.guardarAsignaturas')}}" method="POST">
                                                @csrf
                                                @php
                                                $firstFormato = $formatos->first();
                                                @endphp
                                                <input type="hidden" name="id" value="{{ $firstFormato->IdFormatos }}">
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
                                            
                                            @endforeach
                                                <tr>
                                                    
                                                    <form action="{{ route('Formatos.actualizarUnidades', '$formato->IdFormatos')}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <td style="background-color: gray; color:#fff;"> Unidades</td>
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td> 
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;">
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>  
                                                    <td style="background-color: gray; color:#fff;" >
                                                        <label for="unidad">Unidad</label>
                                                        <select name="unidad" class="form-control" style="height: 39px;">
                                                              <option value="U1"{{ $formato->unidad == 'U1' ? ' selected' : '' }}>U1</option>
                                                              <option value="U2"{{ $formato->unidad == 'U2' ? ' selected' : '' }}>U2</option>
                                                              <option value="U3"{{ $formato->unidad == 'U3' ? ' selected' : '' }}>U3</option>
                                                              <option value="U4"{{ $formato->unidad == 'U4' ? ' selected' : '' }}>U4</option>
                                                              <option value="U5"{{ $formato->unidad == 'U5' ? ' selected' : '' }}>U5</option>
                                                              <option value="U6"{{ $formato->unidad == 'U6' ? ' selected' : '' }}>U6</option>
                                                              <option value="U7"{{ $formato->unidad == 'U7' ? ' selected' : '' }}>U7</option>
                                                              <option value="U8"{{ $formato->unidad == 'U8' ? ' selected' : '' }}>U8</option>
                                                              <option value="U9"{{ $formato->unidad == 'U9' ? ' selected' : '' }}>U9</option>
                                                              <option value="U10"{{ $formato->unidad == 'U10' ? ' selected' : '' }}>U10</option>
                                                              <option value="U11"{{ $formato->unidad == 'U11' ? ' selected' : '' }}>U11</option>
                                                              <option value="U12"{{ $formato->unidad == 'U12' ? ' selected' : '' }}>U12</option>
                                                        </select>
                                                    </td>
                                                    <td style="background-color: gray; color:#fff;"> Observaciones</td> 
                                                    <td style="background-color: gray; color:#fff;"> Agregar comentarios</td> 
                                                    <td style="background-color: gray; color:#fff;"> Acciones</td> 
                                                    <input type="hidden" name="id" value="{{ $formato->IdFormatos}}">
                                                    <td><button type="submit" class="btn btn-warning" formaction="{{ route('Formatos.actualizarUnidades') }}">Guardar unidad</button></td>
                                                  </form>
                                                </tr>
                                                
                                                @foreach ($formatos as $index => $formato)
                                                <tr>
                                                <form action="{{ route('Formatos.store') }}" method="POST">
                                                @csrf
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="text" name="nombre{{$index}}" rows="2.5" cols="10">{{$formato->nombre}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U1{{$index}}" rows="1.5" cols="10">{{$formato->U1}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U2{{$index}}" rows="1.5" cols="10">{{$formato->U2}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U3{{$index}}" rows="1.5" cols="10">{{$formato->U3}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U4{{$index}}" rows="1.5" cols="10">{{$formato->U4}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U5{{$index}}" rows="1.5" cols="10">{{$formato->U5}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U6{{$index}}" rows="1.5" cols="10">{{$formato->U6}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U7{{$index}}" rows="1.5" cols="10">{{$formato->U7}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U8{{$index}}" rows="1.5" cols="10">{{$formato->U8}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U9{{$index}}" rows="1.5" cols="10">{{$formato->U9}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U10{{$index}}" rows="1.5" cols="10">{{$formato->U10}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U11{{$index}}" rows="1.5" cols="10">{{$formato->U11}}</textarea></td>
                                                    <td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U12{{$index}}" rows="1.5" cols="10">{{$formato->U12}}</textarea></td>
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
                                                </tr>
                                                @endforeach
                                            </table>
                                            @section('scripts')
                                            <script>
                                                document.getElementById('agregarFila').addEventListener('click', function() 
                                                {
                                                   // Crea una nueva fila con celdas vacías
                                                    var table = document.querySelector('table');
                                                    var tbody = table.querySelector('tbody');
                                                    var row = document.createElement('tr');

                                                    row.innerHTML =
                                                    '<form action="{{ route('Formatos.store') }}" method="POST">' +
                                                    '@csrf' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="nombre" rows="2.5" cols="10">{{$formato->nombre}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U1" rows="1.5" cols="10">{{$formato->U1}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U2" rows="1.5" cols="10">{{$formato->U2}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U3" rows="1.5" cols="10">{{$formato->U3}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U4" rows="1.5" cols="10">{{$formato->U4}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U5" rows="1.5" cols="10">{{$formato->U5}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U6" rows="1.5" cols="10">{{$formato->U6}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U7" rows="1.5" cols="10">{{$formato->U7}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U8" rows="1.5" cols="10">{{$formato->U8}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U9" rows="1.5" cols="10">{{$formato->U9}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U10" rows="1.5" cols="10">{{$formato->U10}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U11" rows="1.5" cols="10">{{$formato->U11}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;"><textarea style="background-color: #fff; color:black; border-color: white;" type="hidden" name="U12" rows="1.5" cols="10">{{$formato->U12}}</textarea></td>' +
                                                    '<td style="background-color: #fff; color:black;">{{ $formato->observaciones}}</td>'+
                                                    '<td style="background-color: #fff; color:black;">'+
                                                    '<form action="{{ route('Formatos.agregarComentarios') }}" method="POST">'+
                                                    '@csrf'+
                                                    '<input type="hidden" name="id" value="{{ $formato->IdFormatos}}">'+
                                                    '<textarea name="observaciones">{{$formato->observaciones}}</textarea>'+
                                                    '<button type="submit" class="btn btn-warning" href="{{ route('Formatos.agregarComentarios') }}">Guardar comentarios</button> '+
                                                    '</form>'+
                                                    '</td>'+
                                                    '{{-- boton Editar --}}'+
                                                    '<td style="background-color: #fff; color:black;">  '+
                                                    '@can('editar-rol')'+
                                                    '<a class="btn btn-info" href="{{ route('Formatos.edit', $formato->IdFormatos) }}">Editar</a>'+
                                                    '@endcan'+
                                                    '{{--boton borrar--}}'+
                                                    '@can('borrar-rol')'+
                                                    '{!! Form::open(['method' => 'DELETE','route' => ['Formatos.destroy', $formato->IdFormatos],'style'=>'display:inline']) !!}'+
                                                    '{!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}'+
                                                    '{!! Form::close() !!}'+
                                                    '@endcan'+
                                                    '</td>'+
                                                    '<td style="background-color: #fff; color:black;">'+
                                                    '<button type="submit" class="btn btn-dark" href="{{ route('Formatos.store') }}">Guardar filas</button>'+
                                                    '</td>'+
                                                    '</form>'+
                                                    '</form>'+
                                                    '</form>'+
                                                    '</form>'+
                                                    '</form>'+
                                                    '<td></td>' +
                                                    '<td></td>' +
                                                    '<td></td>';

                                                    tbody.appendChild(row);

                                                    var data = {};
                                                    $(row).find('[contenteditable="true"]').each(function()
                                                    {
                                                        var key = $(this).attr('name');
                                                        var value = $(this).text();
                                                        data[key] = value;
                                                    });

                                                    $.ajax(
                                                    {
                                                        url: '{{ route("Formatos.create") }}',
                                                        type: 'POST',
                                                        data: data,
                                                        success: function(response)
                                                        {
                                                            console.log('Los datos se han guardado correctamente en la base de datos.');
                                                        },
                                                        error: function(error)
                                                        {
                                                            console.log('Ha ocurrido un error al guardar los datos en la base de datos.');
                                                        }
                                                    });
                                                });
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