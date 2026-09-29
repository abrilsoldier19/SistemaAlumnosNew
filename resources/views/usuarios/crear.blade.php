@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading titulo-seccion">Alta De Usuarios</h3>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-11 col-sm-12">
                <div class="card formulario-card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('usuarios.store') }}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <label class="form-label-custom" for="name">Nombre:</label>
                                    <input type="text" name="name" id="name"
                                           class="form-control input-moderno"
                                           value="{{ old('name') }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label-custom" for="email">Correo Electrónico:</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control input-moderno"
                                           value="{{ old('email') }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label-custom" for="password">Contraseña:</label>
                                    <input type="password" name="password" id="password"
                                           class="form-control input-moderno">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label-custom" for="confirm-password">
                                        Confirmar Contraseña:
                                    </label>
                                    <input type="password" name="confirm-password"
                                           id="confirm-password"
                                           class="form-control input-moderno">
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label class="form-label-custom" for="roles">
                                        Rol del Usuario:
                                    </label>

                                    <select name="roles[]" id="roles" class="form-control select2">
                                        <option value="">Seleccione un rol</option>
                                        @foreach($roles as $id => $rol)
                                            <option value="{{ $id }}"
                                                {{ old('roles.0') == $id ? 'selected' : '' }}>
                                                {{ $rol }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn-guardar">
                                    <i class="fas fa-save me-2"></i> Guardar
                                </button>

                                <a href="{{ route('usuarios.index') }}" class="btn-cancelar">
                                    <i class="fas fa-arrow-left me-2"></i> Cancelar
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
.titulo-seccion{
    font-family: Century Gothic, sans-serif;
    font-size: 38px;
    font-weight: bold;
    color: #012EBF;
}

.formulario-card{
    border: none;
    border-radius: 18px;
    box-shadow: 0 6px 20px rgba(0,0,0,.08);
    max-width: 950px;
    margin: auto;
}

.form-label-custom{
    font-family: Century Gothic, sans-serif;
    font-weight: bold;
    color: #012EBF;
    margin-bottom: 10px;
}

.input-moderno{
    height: 55px;
    border-radius: 18px !important;
    border: 2px solid #e6e6e6;
    font-size: 16px;
    font-family: Century Gothic, sans-serif;
    padding: 0 18px;
}

.input-moderno:focus{
    border-color: #012EBF;
    box-shadow: 0 0 10px rgba(1,46,191,.15);
}

/* ==========================
   SELECT2 MODERNO
========================== */

.select2-container{
    width: 100% !important;
}

.select2-container .select2-selection--single{
    height: 55px !important;
    border: 2px solid #e6e6e6 !important;
    border-radius: 18px !important;
    background: #fff !important;
    transition: .3s;
}

.select2-container--default.select2-container--focus .select2-selection--single,
.select2-container--default.select2-container--open .select2-selection--single{
    border-color: #012EBF !important;
    box-shadow: 0 0 10px rgba(1,46,191,.15) !important;
}

.select2-container .select2-selection__rendered{
    line-height: 52px !important;
    padding-left: 20px !important;
    color: #333 !important;
    font-size: 16px;
    font-family: Century Gothic, sans-serif;
}

.select2-container .select2-selection__arrow{
    height: 55px !important;
    right: 15px !important;
}

/* ==========================
   DROPDOWN
========================== */

.select2-dropdown{
    border: none !important;
    border-radius: 18px !important;
    overflow: hidden !important;
    box-shadow: 0 8px 20px rgba(0,0,0,.12) !important;
    margin-top: 6px !important;
}

/* ==========================
   QUITAR BUSCADOR
========================== */

.select2-search--dropdown{
    display: none !important;
}

/* ==========================
   OPCIONES
========================== */

.select2-results__option{
    padding: 14px 20px !important;
    font-size: 16px !important;
    font-family: Century Gothic, sans-serif !important;
    color: #333 !important;
    transition: all .2s ease;
}

/* Hover */

.select2-container--default .select2-results__option--highlighted[aria-selected]{
    background: #2563eb !important;
    color: #fff !important;
}

/* Seleccionado */

.select2-container--default .select2-results__option[aria-selected="true"]{
    background: #dbeafe !important;
    color: #012EBF !important;
    font-weight: bold !important;
}

/* ==========================
   SCROLLBAR
========================== */

.select2-results__options::-webkit-scrollbar{
    width: 8px;
}

.select2-results__options::-webkit-scrollbar-track{
    background: #f1f5f9;
}

.select2-results__options::-webkit-scrollbar-thumb{
    background: #cbd5e1;
    border-radius: 20px;
}

.select2-results__options::-webkit-scrollbar-thumb:hover{
    background: #94a3b8;
}

.btn-guardar{
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    margin-right: 15px;
}

.btn-cancelar{
    background: #f3f4f6;
    color: #333;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
}
</style>

<script>
$(document).ready(function () {
    $('#roles').select2({
        width: '100%',
        minimumResultsForSearch: Infinity
    });
});
</script>
@endsection
