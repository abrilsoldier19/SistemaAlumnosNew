<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\CalificacionUnidad;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\Semestre;
use App\Models\Carrera;
use App\Models\AñoSemestre;
use App\Models\AlumnoReprobado;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class AlumnoReprobadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
public function index(Request $request) 
{ 
    $user = Auth::user(); 
    $alumnoReprobados = Calificacion::query(); 
    $user = $request->user(); 
    $calificacionesParciales = CalificacionUnidad::query(); 
    $permission = Permission::get(); 
    $materias = Materia::all(); 
    $carreras = Carrera::all(); 
    $alumnos = User::all(); 
    
    $materiaId = $request->input('Materia_id'); 
    $filtroAlumno = $request->input('Alumno'); 
    $filtroSemestre = $request->input('Semestre');
    $filtroCarrera = $request->input('Carrera'); 
    $filtroTurno = $request->input('turno'); 
    $filtroSalon = $request->input('salon'); 
    
    $alumnoReprobados = Calificacion::query()
        ->join('carreras', 'calificacions.Carrera_id', '=', 'carreras.IdCarreras')
        ->join('users', 'calificacions.Alumno_id', '=', 'users.id')
        ->leftJoin('calificacion_unidad', function ($join) {
    $join->on('calificacions.Alumno_id', '=', 'calificacion_unidad.Alumno_id')
         ->on('calificacions.Materia_id', '=', 'calificacion_unidad.Materia_id');
})
        ->select( 'calificacions.*', 'calificacion_unidad.NumeroUnidad', 'calificacion_unidad.Calificacion_Parcial' ) ->where('Calificacion_final', '<', 70);

    // Aplicar filtros
    if ($filtroCarrera) {
        $alumnoReprobados->where('carreras.IdCarreras', $filtroCarrera);
    }
    if ($filtroAlumno) {
        $alumnoReprobados->where('users.id', $filtroAlumno);
    }
    if ($filtroSemestre) {
        $alumnoReprobados->where('Semester', $filtroSemestre);
    }
    if ($filtroSalon) {
        $alumnoReprobados->where('salon', $filtroSalon);
    }
    if ($filtroTurno) {
        $alumnoReprobados->where('turno', $filtroTurno);
    }

    // Filtrar por el nombre del maestro
    if ($user->hasRole('Maestro')) {
        $alumnoReprobados->where('calificacions.Maestro', $user->name);
    } elseif ($user->hasRole('Alumno')) {
        $alumnoReprobados->where('users.id', $user->id);
    }

    // Obtener los resultados
    $alumnoReprobados = $alumnoReprobados->paginate(7)->appends($request->all());

    return view('AlumnosReprobados.index', compact('materias', 'carreras', 'materiaId', 'filtroCarrera', 'filtroTurno', 'filtroSalon', 'filtroAlumno', 'filtroSemestre', 'alumnos','alumnoReprobados', 'calificacionesParciales')); 
    }


public function homeAdmin()
{
    $contadorReprobados = Calificacion::where('Calificacion_final', '<', 70)
        ->distinct('Alumno_id')
        ->count('Alumno_id');

    return view('homeAdmin', compact('contadorReprobados'));
}

    public function filtrar(Request $request)
    { 
         $user = Auth::user();

        // Obtener los parámetros de búsqueda del formulario
        $alumno = $request->input('Alumno');
        $semestre = $request->input('Semestre');
        $carrera = $request->input('Carrera');
        $turnos = $request->input('turno');
        $salones = $request->input('salon');

        // Obtener las calificaciones según los filtros
        $query = AlumnoReprobado::query();

        if ($user->hasRole('Maestro')) {
        // Si el usuario es un maestro, mostrar solo las calificaciones asignadas a él
        $query->where('Maestro', $user->name);
        } elseif ($user->hasRole('Alumno')) {
        // Si el usuario es un alumno, mostrar solo las calificaciones asignadas a él
        $query->where('Alumno_id', $user->id);
        }

        if (!empty($alumno)) {
            $query->where('Alumno_id', $alumno);
            }
    
           if (!empty($semestre)) {
            $query->where('Semestre_id', $semestre);
           }
    
           if (!empty($carrera)) {
            $query->where('carrera_id', $carrera);
           }
    
           if (!empty($turno)) {
            $query->where('turnos', $turno);
           }
    
           if (!empty($salon)) {
            $query->where('salones', $salon);
           }


       $alumnoReprobados =  $query->paginate(10);

       return view('AlumnosReprobados.index', compact('alumnoReprobados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $alumnoReprobados = AlumnoReprobado::find($id);
        return redirect()->route('AlumnosReprobados.index', compact('alumnoReprobados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}

