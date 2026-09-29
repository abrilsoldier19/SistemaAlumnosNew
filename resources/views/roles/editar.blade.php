@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading titulo-seccion">Editar Rol</h3>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="card formulario-card">
                        <div class="card-body">
                            
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="row">

        <div class="col-md-12">
            <div class="form-group mb-4">

                <label class="form-label-custom">
                    Nombre del Rol
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control input-moderno"
                    value="{{ old('name', $role->name) }}"
                >

            </div>
        </div>

        <div class="col-md-12">

            <label class="form-label-custom">
                Permisos para este Rol
            </label>

            <div class="permisos-container">

                @foreach($permission as $value)

                    <div class="permiso-item">

                        <label>

                            <input
                                type="checkbox"
                                name="permission[]"
                                value="{{ $value->id }}"

                                {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}
                            >

                            {{ $value->name }}

                        </label>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    <div class="text-center mt-4">

        <button type="submit" class="btn-guardar">
            <i class="fas fa-save me-2"></i>
            Actualizar
        </button>

        <a href="{{ route('roles.index') }}"
           class="btn-cancelar">
            <i class="fas fa-arrow-left me-2"></i>
            Cancelar
        </a>

    </div>

</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
    /* TITULO */

.titulo-seccion{
    font-family: Century Gothic, sans-serif;
    font-size: 38px;
    font-weight: bold;
    color: #012EBF;
}

/* CARD */

.formulario-card{
    border: none;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,.08);
}

/* LABEL */

.form-label-custom{
    font-family: Century Gothic, sans-serif;
    font-weight: bold;
    color: #012EBF;
    margin-bottom: 10px;
}

/* INPUT */

.input-moderno{
    height: 55px;
    border-radius: 12px;
    border: 2px solid #e6e6e6;
    font-size: 16px;
    font-family: Century Gothic, sans-serif;
}

.input-moderno:focus{
    border-color: #012EBF;
    box-shadow: 0 0 10px rgba(1,46,191,.15);
}

/* BOTON guardar */

.btn-guardar{
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    transition: .3s;
    margin-right: 17px;
}

.btn-guardar:hover{
    background: #1d4ed8;
    color: white;
    text-decoration: none;
}

/* BOTON VOLVER */

.btn-cancelar{
    background: #f3f4f6;
    color: #333;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    display: inline-block;
    transition: .3s;
}

.btn-cancelar:hover{
    background: #e5e7eb;
    color: black;
    text-decoration: none;
}
</style>
    
@endsection
