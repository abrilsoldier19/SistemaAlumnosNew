@can('crear-rol')
@extends('layouts.app')

@section('content')

<section class="section">

    <div class="section-header">
        <h3 class="page__heading titulo-seccion">
            Editar Semestre
        </h3>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card formulario-card">
                    <div class="card-body">

                        <form method="POST"
                              action="{{ route('Semestres.update', $semestre->IdSemestres) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label class="form-label-custom">
                                    Nombre del semestre
                                </label>

                                <input
                                    type="text"
                                    class="form-control input-moderno"
                                    id="Semestre"
                                    name="Semestre"
                                    value="{{ old('Semestre', $semestre->Semestre) }}"
                                    required>
                            </div>

                            <div class="text-center">

                                <button type="submit"
                                        class="btn-actualizar">
                                    <i class="fas fa-save"></i>
                                    Actualizar
                                </button>

                                <a href="{{ route('Semestres.index') }}"
                                   class="btn-cancelar">
                                    <i class="fas fa-arrow-left"></i>
                                    Volver
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

/* BOTON ACTUALIZAR */

.btn-actualizar{
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    transition: .3s;
    margin-right: 10px;
}

.btn-actualizar:hover{
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
@endcan