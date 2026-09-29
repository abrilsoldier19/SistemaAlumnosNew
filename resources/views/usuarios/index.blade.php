@can('crear-rol')
@extends('layouts.app')

@section('content')
<section class="section">
    
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    
  <div class="section-header">
      <h3 class="page__heading">Usuarios</h3>
  </div>
 @if (Auth::user()->hasRole('Administrador'))
<form action="{{ route('usuarios.index') }}" method="GET" class="text-center">
    <div class="d-flex justify-content-center align-items-center mb-3">
        <select class="select2 form-control me-2"
                name="name"
                id="name"
                style="width:auto; min-width:250px;">

            <option value="">Todos los usuarios</option>

            @foreach ($usuarios_nombre as $usuario)
                <option value="{{ $usuario->name }}"
                    {{ $filtroUsuario == $usuario->name ? 'selected' : '' }}>
                    {{ $usuario->name }}
                </option>
            @endforeach

        </select>

        <button type="submit" class="btn btn-primary">
            Buscar
        </button>
    </div>
</form>
@endif
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">       
                      @can('crear-rol')                
                           <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>  <!--boton de nuevo        -->
                         @endcan

                            <table class="table tabla-moderna mt-2">
                              <thead style="background-color:#6777ef">                                     
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">E-mail</th>
                                  <th style="color:#fff;">Rol</th>
                                  <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                      @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)                                       
                                          <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                        @endforeach
                                      @endif
                                    </td>

                                    <td>   
                                      <div class="acciones-botones">

        @can('editar-rol')
            <a class="button-editar"
               href="{{ route('usuarios.edit', $usuario->id) }}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        @endcan

        @can('borrar-rol')
            <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="button-borrar"
                        onclick="return confirm('多Seguro que deseas borrar este registro?')">
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
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                          </div>     
                            
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    
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

   
/* TABLA */

.tabla-scroll {
    width: 100%;
    padding: 8px;
}

.tabla-moderna {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    border-collapse: separate;
    border-spacing: 0;
    font-family: Century Gothic, sans-serif;
    border-radius: 14px;
    overflow: hidden;
}

.tabla-moderna thead th {
    background: #e7e8f5 !important;
    color: #111 !important;
    font-size: 15px;
    font-weight: 700;
    padding: 14px 18px;
    border: none;
    text-align: center;
}

.tabla-moderna tbody td {
    font-size: 15px;
    padding: 14px 18px;
    border: none;
    text-align: center;
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
    transition: 0.3s;
}

/* Ancho de columnas */
.tabla-moderna th:nth-child(1),
.tabla-moderna td:nth-child(1) {
    width: 20%;
}

.tabla-moderna th:nth-child(2),
.tabla-moderna td:nth-child(2) {
    width: 50%;
}

.tabla-moderna th:nth-child(3),
.tabla-moderna td:nth-child(3) {
    width: 30%;
}

/* Bordes redondeados */
.tabla-moderna thead th:first-child {
    border-top-left-radius: 14px;
}

.tabla-moderna thead th:last-child {
    border-top-right-radius: 14px;
}

.tabla-moderna tbody tr:last-child td:first-child {
    border-bottom-left-radius: 14px;
}

.tabla-moderna tbody tr:last-child td:last-child {
    border-bottom-right-radius: 14px;
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

</style>
    
@endsection
@endcan