@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h3 class="page__heading">Anexo 15 Casos Especiales 2021</h3>
      <div class="card-body">
        <h4>Bienvenido. {{ auth()->user()->name }} {{ auth()->user()->email }}</h4>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @can('crear-rol')
                <a class="btn btn-warning" href="{{ route('Formatos.create') }}">Nuevo</a>
              @endcan
              <table class="table table-striped mt-2">
                <thead style="background-color:#6777ef">
                  <tr>
                    <th style="color:#fff;">Asignatura/Unidades</th>
                    <th style="color:#fff;">Unidad 1</th>
                    <th style="color:#fff;">Unidad 2</th>
                    <th style="color:#fff;">Unidad 3</th>
                    <th style="color:#fff;">Unidad 4</th>
                    <th style="color:#fff;">Unidad 5</th>
                    <th style="color:#fff;">Unidad 6</th>
                    <th style="color:#fff;">Unidad 7</th>
                    <th style="color:#fff;">Unidad 8</th>
                    <th style="color:#fff;">Unidad 9</th>
                    <th style="color:#fff;">Unidad 10</th>
                    <th style="color:#fff;">Unidad 11</th>
                    <th style="color:#fff;">Unidad 12</th>
                    <th style="color:#fff;">Observaciones</th>
                    <th style="color:#fff;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($formatos as $formato)
                  <form method="POST" action="{{ route('Formatos.actualizarUnidades', $formato->IdFormatos) }}">
                  @csrf
                  @method('PUT')
                    <tr>
                      <td>
                           <input type="text" name="nombre" value="{{ $formato->nombre }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U1" value="{{ $formato->U1 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U2" value="{{ $formato->U2 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U3" value="{{ $formato->U3 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U4" value="{{ $formato->U4 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U5" value="{{ $formato->U5 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U6" value="{{ $formato->U6 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U7" value="{{ $formato->U7 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U8" value="{{ $formato->U8 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U9" value="{{ $formato->U9 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U10" value="{{ $formato->U10 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U12" value="{{ $formato->U11 }}" class="form-control">
                      </td>
                      <td>
                           <input type="text" name="U12" value="{{ $formato->U12 }}" class="form-control">
                      </td>
                      <td>{{ $formato->observaciones }}</td>
                      <td>
                        @can('editar-rol')
                          <a class="btn btn-sm btn-primary" href="{{ route('Formatos.edit', $formato->IdFormatos) }}">Editar</a>
                        @endcan
                      </td>
                      <td>
                            <button type="submit" class="btn btn-warning" href="{{ route('Formatos.actualizarUnidades') }}">Guardar</button>
                      </td>
                    </tr>
                    </form>
                  @endforeach
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
