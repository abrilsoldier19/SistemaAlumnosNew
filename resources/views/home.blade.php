<?php
use App\Models\Calificacion;
use App\Models\Role;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$user = auth()->user();
$usuarios = Calificacion::where('Maestro', $user->name)->count();


$AlumnosReprobados = Calificacion::where('Maestro', $user->name)->where('Calificacion_Final', '<', 70)->count();


$cant_blogs = Blog::count(); 
$cant_usuarios = User::count();   
$cant_roles = Role::count();   

$cant_users = Calificacion::where('Calificacion_Final', '<', 70)->count();

?>


@extends('layouts.app')

@section('content')
    <section class="section">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
        <div class="section-header">
            <h3 class="page__heading">MENU</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                        <div class="card-body">                          
                                <div class="row justify-content-center">
                                @if (Auth::user()->hasRole('Maestro'))
                                    <div class="col-md-4 col-xl-2">
                                        <button onclick="window.location='{{ route('Calificaciones.index') }}'" class="card order-card" style="width: 280px; height: 200px; background-color: #0389cd; font-family: Century Gothic, sans-serif;">
                                        <div class="card-block">
                                            <h5>Calificaciones alumnos</h5><br><br>          
                                            <h2 class="text-right"><i class="fas fa-book-open f-left"></i><span>{{$usuarios}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ url('/Calificaciones') }}" class="text-white">Ver más</a></p>
                                        </div>                                            
                                        </button>                                    
                                    </div>
                                    <div class="col-md-4 col-xl-2">
                                        <button onclick="window.location='{{ route('AlumnosReprobados.index') }}'"  style="width: 280px; height: 200px; font-family: Century Gothic, sans-serif;" class="card bg-dark order-card" id="reprobadosCard">
                                        <div class="card-block">
                                            <h5>Alumnos Reprobados</h5>   <br><br> 
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$AlumnosReprobados}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ url('/AlumnosReprobados') }}" class="text-white">Ver más</a></p>
                                        </div>
                                        </button>
                                    </div>  
                                    <div class="col-md-4 col-xl-2">
                                        <button onclick="window.location='{{ route('blogs.index') }}'" class="card order-card" style="width: 250px; height: 200px; background-color: #0561b2; font-family: Century Gothic, sans-serif;">
                                        <div class="card-block">
                                            <h5 style="font-family: Century Gothic, sans-serif; font-weight: bold;">Seccion Blogs</h5><br><br>                                                
                                            
                                            <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_blogs}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{ url('/blogs') }}" class="text-white">Ver más</a></p>
                                        </div>
                                        </button>
                                    </div> 
                                @endif   


                                @can('Administrador-rol') 
                                    <div class="col-md-3 mb-3">
                                        <button onclick="window.location='{{ route('usuarios.index') }}'" class="card order-card" style="background-color: #0389cd; font-family: Century Gothic, sans-serif;">
                                        <div class="card-block">
                                            <h5>Usuarios registrados</h5><br>
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/usuarios') }}" class="text-white">Ver más</a></p>
                                        </div>
                                        </button>                                   
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <button onclick="window.location='{{ route('blogs.index') }}'"  class="card bg-dark order-card" id="reprobadosCard" style="font-family: Century Gothic, sans-serif;">
                                            <div class="card-block">
                                            <h5>Proximamente</h5>   <br><br>     
                                                <h2 class="text-right"><i class="fas fa-edit f-left"></i><span>{{$cant_blogs}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/blogs') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div>   
                                    <div class="col-md-3 mb-3">
                                        <button onclick="window.location='{{ route('roles.index') }}'"  class="card bg-info order-card" style="font-family: Century Gothic, sans-serif;">
                                            <div class="card-block">
                                                <h5>Cantidad de Roles</h5> <br><br> 
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/roles') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div>      
                                    <div class="col-md-3 mb-lg-0">
                                        <button onclick="window.location='{{ route('AlumnosReprobados.index') }}'" class="card order-card" style="background-color: #330099; font-family: Century Gothic, sans-serif;">
                                            <div class="card-block">
                                                <h5>Alumnos Reprobados</h5><br>   
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_users}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/AlumnosReprobados') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div>
                                @endcan
                                    
                                    
                                    @if (Auth::user()->hasRole('Alumno'))
                                    <div class="col-md-4 col-xl-3">
                                        <button onclick="window.location='{{ route('Calificaciones.index') }}'" class="card order-card" style="width: 290px; height: 200px; background-color: #0389cd; font-family: Century Gothic, sans-serif;">
                                        <div class="card-block">
                                            <h5>Tabla de Calificaciones</h5><br>          
                                            <h2 class="text-right"><i class="fas fa-book-open"></i></h2>
                                            <p class="m-b-0 text-right"><a href="{{ url('/Calificaciones') }}" class="text-white">Ver más</a></p>
                                        </div>                                            
                                        </button>                                       
                                    </div>
                                    
                                    
                                    <div class="col-md-4 col-xl-3">
                                        <button onclick="window.location='{{ route('blogs.index') }}'"  class="card bg-dark order-card" id="reprobadosCard" style="width: 270px; height: 200px; font-family: Century Gothic, sans-serif;">
                                            <div style="width: 270px; height: 200px;" class="card-block">
                                            <h5>Proximamente</h5>   <br><br>     
                                                <h2 class="text-right"><i class="fas fa-edit"></i></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/blogs') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div> 
                                    @endif    
                                </div>                 
                        </div>
                </div>
            </div>
        </div>
    </section>
    <style>
       .card-link {
        display: block;
        text-decoration: none;
    }

    .card {
        transition: transform 0.2s ease;
        position: relative;
        
        
    }

    .card {
        transition: transform 0.2s ease;
        position: relative;
        width: 250px;
        height: 200px;
        
    }

    .card:hover {
        transform: scale(1.1);
    }

    .card-block {
        /* Reset the transform on the content to avoid scaling */
        transform: scale(1);
    }

    
    
    </style>
    @section('scripts')
    <script>
    // JavaScript to toggle the 'card-selected' class at a regular interval
    const reprobadosCard = document.getElementById('reprobadosCard');
    let isCardSelected = false;

    setInterval(() => {
        isCardSelected = !isCardSelected;
        if (isCardSelected) {
            reprobadosCard.classList.add('card-selected');
        } else {
            reprobadosCard.classList.remove('card-selected');
        }
    }, 2000); // Change 2000 to the desired interval in milliseconds (e.g., 1000 for 1 second)
</script>
    @endsection

@endsection

