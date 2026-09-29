<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;

//agregamos lo siguiente
use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\AlumnoReprobado;
use App\Models\User;
use App\Models\Carrera;
use App\Models\Semestre;
use App\Models\Formato;
use App\Models\Materia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class FormatoController extends Controller
{
    // $data = Process::with('user')->findOrFail(Auth::id()); 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index(Request $request)
{
    $user = Auth::user();

    // Filtros del request (normalizados)
    $carreraId   = $request->input('carrera_id');
    $alumnoId    = $request->input('Alumno');
    $semestre    = $request->input('Semestre') ?? $request->input('Semestre_id');
    $turno       = $request->input('turno');
    $salon       = $request->input('salon');
    $maestroId   = $request->input('maestro'); // en tu BD "Maestro" es el nombre

    // Query base: reprobados + join con calificacion_unidad
    $estudiantes = Calificacion::query()
    ->join('users', 'users.id', '=', 'calificacions.Alumno_id')
    ->join('materias', 'materias.IdMaterias', '=', 'calificacions.Materia_id')
    ->leftJoin('calificacion_unidad', function ($join) {
        $join->on('calificacions.Alumno_id', '=', 'calificacion_unidad.Alumno_id')
             ->on('calificacions.Materia_id', '=', 'calificacion_unidad.Materia_id');
    })
    ->leftJoin('formatos', 'formatos.calificacion_id', '=', 'calificacions.IdCalificacions')
    ->select(
        'users.name as Alumno',
        'materias.NombreMateria',
        'calificacions.*',
        'calificacion_unidad.NumeroUnidad as numero_unidad',
        'calificacion_unidad.Calificacion_Parcial as calificacion_parcial',
        'formatos.IdFormatos as formato_id',
        'formatos.observaciones'
    )
    ->where('calificacions.Calificacion_final', '<', 70);


    // Filtros opcionales
    if (!empty($carreraId)) {
        $estudiantes->where('calificacions.Carrera_id', $carreraId);
    }
    if (!empty($alumnoId)) {
        $estudiantes->where('users.id', $alumnoId);
    }
    if (!empty($semestre)) {
        // Si tu columna es exacta, cambia a ->where('calificacions.Semester', $semestre)
        $estudiantes->where('calificacions.Semester', 'like', "%{$semestre}%");
    }
    if (!empty($turno)) {
        $estudiantes->where('calificacions.turno', $turno);
    }
    if (!empty($salon)) {
        $estudiantes->where('calificacions.salon', $salon);
    }
    if (!empty($maestroId)) {
        $estudiantes->where('calificacions.Maestro', $maestroId);
    }

    // Alcance por rol
    if ($user->hasRole('Maestro')) {
        $estudiantes->where('calificacions.Maestro', $user->name);
    } elseif ($user->hasRole('Alumno')) {
        $estudiantes->where('users.id', $user->id);
    }

    // Paginación con query string
    $estudiantes = $estudiantes->paginate(7)->appends($request->all());

    // Catálogos y datos que tu vista espera
    $carreras  = Carrera::all();
    $semestres = Semestre::all();
    $maestros  = Maestro::all();
    $formatos  = Formato::paginate(6);

    // Listas/distintos para selects
    $subjects = Calificacion::join('materias', 'materias.IdMaterias', '=', 'calificacions.Materia_id')
        ->select('materias.IdMaterias', 'materias.NombreMateria')
        ->distinct()
        ->get();

    $alumnos = User::whereIn(
        'id',
        Calificacion::select('Alumno_id')->distinct()->pluck('Alumno_id')
    )->get();

    $turnos = Calificacion::select('turno')->whereNotNull('turno')->distinct()->pluck('turno');
    $salones = Calificacion::select('salon')->whereNotNull('salon')->distinct()->pluck('salon');

    // Si la vista usa estas variables, mantenlas
    $calificaciones = Calificacion::all();

    return view('Formatos.index', compact(
        'carreras',
        'alumnos',
        'estudiantes',
        'subjects',
        'semestres',
        'calificaciones',
        'maestros',
        'turnos',
        'salones',
        'formatos',
        'carreraId',
        'maestroId'
    ));
}
     
public function agregarComentarios(Request $request)
{
    $data = $request->validate([
        'calificacion_id' => ['required','integer','exists:calificacions,IdCalificacions'],
        'observaciones'   => ['nullable','string'],
    ]);

    Formato::updateOrCreate(
        ['calificacion_id' => $data['calificacion_id']],
        ['observaciones'   => $data['observaciones']]
    );

    return redirect()
        ->route('Formatos.index', $request->query()) // opcional: conserva filtros
        ->with('success', 'Comentario guardado exitosamente.');
}

    public function edit(Request $request, $id)
    {
        $formato = Formato::find($id);
        $permission = Permission::get();
    
        return view('Formatos.editar', compact('permission', 'formato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
        $formato= Formato::find($id);
        return view('Formatos.index', compact('formato'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formato = Formato::findOrFail($id);
        $formato->delete();

        return redirect()->route('Formatos.index')->with('success', 'Calificación eliminada exitosamente.');
    }
}
