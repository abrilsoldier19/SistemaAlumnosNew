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
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <button onclick="window.location='{{ route('usuarios.index') }}'" class="card order-card" style="background-color: #0389cd; ">
                                        <div class="card-block">
                                            <h5>Usuarios registrados</h5><br><br>                                                   
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/usuarios') }}" class="text-white">Ver más</a></p>
                                        </div>
                                        </button>                                   
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <button onclick="window.location='{{ route('blogs.index') }}'"  class="card bg-dark order-card" id="reprobadosCard">
                                            <div class="card-block">
                                            <h5>Proximamente</h5>   <br><br>                                            
                                                @php
                                                use App\Models\Blog;
                                                $cant_blogs = Blog::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-edit f-left"></i><span>{{$cant_blogs}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/blogs') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div>   
                                    <div class="col-md-3 mb-3">
                                        <button onclick="window.location='{{ route('roles.index') }}'"  class="card bg-info order-card">
                                            <div class="card-block">
                                                <h5>Cantidad de Roles</h5> <br><br>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/roles') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div>                                                                 
                                    
                                    <div class="col-md-3 mb-lg-0">
                                        <button onclick="window.location='{{ route('AlumnosReprobados.index') }}'" class="card order-card" style="background-color: #330099	; ">
                                            <div class="card-block">
                                                <h5>Alumnos Reprobados</h5><br>                                           
                                                
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{ $contadorReprobados }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="{{ url('/AlumnosReprobados') }}" class="text-white">Ver más</a></p>
                                            </div>
                                        </button>
                                    </div>      
                                        
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

