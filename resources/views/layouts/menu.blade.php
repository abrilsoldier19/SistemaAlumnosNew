<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <br>@if (Auth::user()->hasRole('Maestro')) 
    <a class="nav-link" href="{{ url('/home') }}" >
        <i class=" fas fa-building"></i><span>Dashboard Maestro</span>
    </a>@endif
    <br>@can('Administrador-rol') 
    <a class="nav-link" href="{{ url('/homeAdmin') }}">
        <i class=" fas fa-building"></i><span>Dashboard Admin</span>
    </a>@endcan
    @can('Administrador-rol')
    <a class="nav-link" href="{{ url('/usuarios') }}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>@endcan
     @can('Administrador-rol')
    <a class="nav-link" href="{{ url('/roles') }}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>@endcan 
    @can('Maestro-rol')
    <a class="nav-link" href="{{ url('/AlumnosReprobados') }}">
        <i class=" fas fa-user-times"></i><span>Alumnos Reprobados</span>
    </a>@endcan
    @can('Administrador-rol')
    <a class="nav-link" href="{{ url('/Carreras') }}">
        <i class=" fas fa-graduation-cap"></i><span>Carreras</span>
    </a>@endcan
    @can('Maestro-rol')
    <a class="nav-link" href="{{ url('/Materias') }}">
        <i class=" fas fa-atom"></i><span>Materias</span>
    </a>@endcan
    @can('Administrador-rol')
    <a class="nav-link" href="{{ url('/Semestres') }}">
        <i class=" fas fa-book-open"></i><span>Semestres</span>
    </a>@endcan
    @can('Maestro-rol')
    <a class="nav-link" href="{{ url('/Calificaciones') }}">
        <i class=" fas fa-address-book"></i><span>Calificaciones</span>
    </a>@endcan
    @if (Auth::user()->hasRole('Maestro'))
    <a class="nav-link" href="{{ url('/grupoMateria') }}">
        <i class=" fas fa-address-book"></i><span>Grupos por materia</span>
    </a>@endif
    @can('Maestro-rol')
    <a class="nav-link" href="{{ url('/Maestros') }}">
        <i class=" fas fa-chalkboard-teacher"></i><span>Maestros</span>
    </a>@endcan
    
</li>
@if (Auth::user()->hasRole('Alumno'))
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/homeAlumno') }}">
        <i class="fas fa-building"></i><span>Dashboard Alumno {{--{{\Illuminate\Support\Facades\Auth::user()->name}}</div>--}}</span> 
    </a>
    <a class="nav-link" href="{{ url('/Calificaciones') }}">
        <i class="fas fa-address-book"></i><span>Calificaciones</span>
    </a>
    
</li>
@endif