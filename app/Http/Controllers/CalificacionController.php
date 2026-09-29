<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos lo siguiente
use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\CalificacionUnidad;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\User;
use App\Models\Maestro;
use App\Models\Semestre;
use App\Models\AñoSemestre;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class CalificacionController extends Controller
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
    $calificaciones = Calificacion::query();
    $user = $request->user();
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

    $calificaciones->join('carreras', 'calificacions.Carrera_id', '=', 'carreras.IdCarreras')
        ->join('users', 'calificacions.Alumno_id', '=', 'users.id');



    if ($filtroCarrera) {
        $calificaciones->where('carreras.IdCarreras', $filtroCarrera);
    }

    if ($filtroAlumno) {
         $calificaciones->where('users.id', $filtroAlumno);
    }

     if ($filtroSemestre) {
        $calificaciones->where('Semester', $filtroSemestre);
    }

    if ($filtroSalon) {
        $calificaciones->where('salon', $filtroSalon);
    }

    if ($filtroTurno) {
       $calificaciones->where('turno', $filtroTurno);
    }
    
    
    if ($user->hasRole('Maestro')) {
        // If the user is a teacher, show only the calificaciones assigned to them
        $calificaciones->where('Maestro', $user->name);
    } elseif ($user->hasRole('Alumno')) {
        // If the user is an alumno, show only their own calificaciones
        $calificaciones->where('Alumno_id', $user->id);
    }

    if ($user->hasRole('Administrador')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
        } elseif ($user->hasRole('Maestro')) {
            $alumnos = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->get();
        } else {
            $alumnos = collect([$user]);
        }
        
    // Recuperar calificaciones por unidad
    $calificacionesConUnidades = CalificacionUnidad::whereIn('Materia_id', $calificaciones->pluck('Materia_id'))
        ->whereIn('Alumno_id', $calificaciones->pluck('Alumno_id'))
        ->get();
    
    $calificaciones = $calificaciones->paginate(7)->appends($request->all());

         
    return view('Calificaciones.index', compact('calificaciones', 'materias', 'carreras', 'materiaId', 'filtroCarrera', 'filtroTurno', 'filtroSalon', 'filtroAlumno', 'filtroSemestre', 'alumnos', 'calificacionesConUnidades'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $currentUser = $request->user();
        $permission = Permission::get();
        $carreras = Carrera::all();
        $carreraAlumno = $currentUser->carrera_id;
        $materias = Materia::all();
        $maestros = Maestro::all();
        $cicloescolars = AñoSemestre::all();
        $semestres = Semestre::all();

        // Obtén los alumnos según el tipo de usuario
        if ($currentUser->hasRole('Administrador')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
        } elseif ($currentUser->hasRole('Maestro')) {
            $alumnos = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->get();
        } else {
            $alumnos = collect([$currentUser]);
        }
    return view('Calificaciones.crear', compact('permission', 'currentUser', 'alumnos', 'carreraAlumno', 'materias',  'carreras', 'maestros', 'cicloescolars','semestres'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar datos de entrada
    $request->validate([
        'Alumno_id' => 'required',
        'Materia_id' => 'required',
        'calificaciones.*' => 'required|numeric|between:0,100', // Validar cada calificación en el rango de 0 a 100
        'Semester' => 'required',
        'Maestro' => 'required',
        'ciclo_escolar' => 'required',
        'Carrera_id' => 'required',
        'turno' => 'required',
        'salon' => 'required',
        // ...resto de las validaciones
    ]);

    // Crear una nueva calificación
    $calificacion = new Calificacion;
    $calificacion->Alumno_id = $request->input('Alumno_id');
    $calificacion->Materia_id = $request->input('Materia_id');
    $calificacion->Semester = $request->input('Semester');
    $calificacion->Maestro = $request->input('Maestro');
    $calificacion->ciclo_escolar = $request->input('ciclo_escolar');
    $calificacion->Carrera_id = $request->input('Carrera_id');
    $calificacion->turno = $request->input('turno');
    $calificacion->salon = $request->input('salon');

    // Calcular la calificación final
    $calificaciones = $request->input('calificaciones', []);
    $totalUnidades = count($calificaciones);
    if ($totalUnidades > 0) {
        $calificacion->Calificacion_Final = array_sum($calificaciones) / $totalUnidades;
    } else {
        $calificacion->Calificacion_Final = 0;
    }

    // Guardar la calificación
    $calificacion->save();

    // Concatenate `NumeroUnidad` and `Calificacion_Parcial` values
    $unidadesConcatenadas = [];
    $calificacionesConcatenadas = [];

    foreach ($calificaciones as $index => $calificacionValue) {
        $unidadesConcatenadas[] = 'Unidad ' . ($index + 1);
        $calificacionesConcatenadas[] = $calificacionValue;
    }

    // Convert arrays to strings
    $unidadesString = implode(', ', $unidadesConcatenadas);
    $calificacionesString = implode(', ', $calificacionesConcatenadas);

    // Save concatenated data in a single `Unidad` record
    CalificacionUnidad::create([
        'NumeroUnidad' => $unidadesString,
        'Calificacion_Parcial' => $calificacionesString,
        'Alumno_id' => $request->input('Alumno_id'),
        'Materia_id' => $request->input('Materia_id'),
        'Semester' => $request->input('Semester'),
        'Maestro' => $request->input('Maestro'),
        'ciclo_escolar' => $request->input('ciclo_escolar'),
        'Carrera_id' => $request->input('Carrera_id'),
        'turno' => $request->input('turno'),
        'salon' => $request->input('salon'),
    ]);

    return redirect()->route('Calificaciones.index')->with('success', 'Calificación creada exitosamente.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function agregarComentarios(Request $request)
    {
        $id = $request->input('id');
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->comentarios = $request->input('comentarios');
        $calificacion->save();


        return redirect()->route('Calificaciones.index')->with('success', 'Comentario creada exitosamente.');
    }



    public function edit(Request $request, $id)
    {
         $calificacion = Calificacion::find($id);
         $currentUser = $request->user();
         $permission = Permission::get();
         $carreras = Carrera::all();
         $unidades = CalificacionUnidad::where('Alumno_id', $calificacion->Alumno_id)
                       ->where('Materia_id', $calificacion->Materia_id)
                       ->get();
         $carreraAlumno = $currentUser->carrera_id;
         $materias = Materia::all();
         $maestros = Maestro::all();
         $semestres = Semestre::all();
         $añosemestres = AñoSemestre::all();
         
         
 
         // Obtén los alumnos según el tipo de usuario
         if ($currentUser->hasRole('Administrador')) {
         $alumnos = User::whereHas('roles', function ($query) {
             $query->where('name', 'Alumno');
         })->get();
         } elseif ($currentUser->hasRole('Maestro')) {
             $alumnos = User::whereHas('roles', function ($query) {
                 $query->where('name', 'Alumno');
             })->get();
         } else {
             $alumnos = collect([$currentUser]);
         }
         $materiaSeleccionada = $calificacion->materia_id;
         
         
         if ($unidades->isNotEmpty()) {
    // Suponiendo que $unidades es una colección con un único registro concatenado
    $unidadRecord = $unidades->first();
    $numerosUnidades = explode(', ', $unidadRecord->NumeroUnidad);
    $calificacionesParciales = explode(', ', $unidadRecord->Calificacion_Parcial);
    
    // Creamos un array de unidades para iterar en la vista
    $unidadesArray = [];
    foreach ($numerosUnidades as $index => $numero) {
        $unidadesArray[] = [
            'NumeroUnidad' => $numero,
            'Calificacion_Parcial' => $calificacionesParciales[$index] ?? null,
        ];
    }
} else {
    $unidadesArray = [];
}
         
     return view('Calificaciones.editar', compact('permission', 'currentUser', 'alumnos', 'materias', 'carreras', 'carreraAlumno', 'maestros', 'calificacion', 'añosemestres', 'materiaSeleccionada', 'unidades', 'semestres', 'unidadesArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validar datos de entrada
    $request->validate([
        'Alumno_id' => 'required',
        'Materia_id' => 'required',
        'calificaciones.*' => 'required|numeric|between:0,100', // Validar cada calificación en el rango de 0 a 100
        'Semester' => 'required',
        'Maestro' => 'required',
        'ciclo_escolar' => 'required',
        'Carrera_id' => 'required',
        'turno' => 'required',
        'salon' => 'required',
        // ...resto de las validaciones
    ]);

    $calificacion = Calificacion::find($id);

    if (!$calificacion) {
        return redirect()->route('Calificaciones.index')->with('error', 'No se pudo encontrar la calificación que intenta actualizar.');
    }

    // Actualizar la información principal
    $calificacion->update([
        'Alumno_id' => $request->Alumno_id,
        'Materia_id' => $request->Materia_id,
        'Semester' => $request->Semester,
        'Maestro' => $request->Maestro,
        'ciclo_escolar' => $request->ciclo_escolar,
        'Carrera_id' => $request->Carrera_id,
        'turno' => $request->turno,
        'salon' => $request->salon,
    ]);

    // Calcular la calificación final
    $calificacionesArray = $request->input('calificaciones', []);
    $totalUnidades = count($calificacionesArray);
    if ($totalUnidades > 0) {
        $calificacion->Calificacion_Final = array_sum($calificacionesArray) / $totalUnidades;
    } else {
        $calificacion->Calificacion_Final = 0;
    }

    $calificacion->save();

    // Preparar datos para actualizar o crear la entidad `Unidad`
   $unidadesConcatenadas = [];
    $calificacionesConcatenadas = [];
    foreach ($calificacionesArray as $index => $calificacionParcial) {
        // Puedes personalizar el formato de la unidad, por ejemplo "Unidad 1", "Unidad 2", etc.
        $unidadesConcatenadas[] = 'Unidad ' . ($index + 1);
        $calificacionesConcatenadas[] = $calificacionParcial;
    }
    $unidadesString = implode(', ', $unidadesConcatenadas);
    $calificacionesString = implode(', ', $calificacionesConcatenadas);

    // Buscar si ya existe un registro para estas calificaciones parciales
    $unidad = CalificacionUnidad::where('Alumno_id', $calificacion->Alumno_id)
                ->where('Materia_id', $calificacion->Materia_id)
                ->where('Carrera_id', $calificacion->Carrera_id)
                ->first();

    if ($unidad) {
        // Actualiza el registro existente
        $unidad->NumeroUnidad = $unidadesString;
        $unidad->Calificacion_Parcial = $calificacionesString;
        $unidad->Semester = $request->input('Semester');
        $unidad->Maestro = $request->input('Maestro');
        $unidad->ciclo_escolar = $request->input('ciclo_escolar');
        $unidad->turno = $request->input('turno');
        $unidad->salon = $request->input('salon');
        $unidad->save();
    } else {
        // Si no existe, crea un nuevo registro
        CalificacionUnidad::create([
            'NumeroUnidad' => $unidadesString,
            'Calificacion_Parcial' => $calificacionesString,
            'Alumno_id' => $calificacion->Alumno_id,
            'Materia_id' => $calificacion->Materia_id,
            'Carrera_id' => $calificacion->Carrera_id,
            'Maestro' => $calificacion->Maestro,
            'Semester' => $calificacion->Semester,
            'ciclo_escolar' => $calificacion->ciclo_escolar,
            'turno' => $calificacion->turno,
            'salon' => $calificacion->salon,
        ]);
    }

    return redirect()->route('Calificaciones.index')->with('success', 'Calificación actualizada con éxito.');
}


    public function show($id) {
        $calificacion = Calificacion::find($id);
        return redirect()->route('Calificaciones.index', compact('calificacion'));
    }
    public function calificacionParcial(Request $request)
{
    $user = Auth::user();
    $calificaciones = CalificacionUnidad::query();
    $user = $request->user();
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

    $calificaciones->join('carreras', 'calificacion_unidad.Carrera_id', '=', 'carreras.IdCarreras')
        ->join('users', 'calificacion_unidad.Alumno_id', '=', 'users.id');



    if ($filtroCarrera) {
        $calificaciones->where('carreras.IdCarreras', $filtroCarrera);
    }

    if ($filtroAlumno) {
         $calificaciones->where('users.id', $filtroAlumno);
    }

     if ($filtroSemestre) {
        $calificaciones->where('Semester', $filtroSemestre);
    }

    if ($filtroSalon) {
        $calificaciones->where('salon', $filtroSalon);
    }

    if ($filtroTurno) {
       $calificaciones->where('turno', $filtroTurno);
    }
    
    
    if ($user->hasRole('Maestro')) {
        // If the user is a teacher, show only the calificaciones assigned to them
        $calificaciones->where('Maestro', $user->name);
    } elseif ($user->hasRole('Alumno')) {
        // If the user is an alumno, show only their own calificaciones
        $calificaciones->where('Alumno_id', $user->id);
    }

    if ($user->hasRole('Administrador')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
        } elseif ($user->hasRole('Maestro')) {
            $alumnos = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->get();
        } else {
            $alumnos = collect([$user]);
        }
    $calificaciones = $calificaciones->paginate(7)->appends($request->all());


         
    return view('Calificaciones.calificacionParcial', compact('calificaciones', 'materias', 'carreras', 'materiaId', 'filtroCarrera', 'filtroTurno', 'filtroSalon', 'filtroAlumno', 'filtroSemestre', 'alumnos'));
}


public function grupoMateria(Request $request)
{
    $user = Auth::user();
    $calificaciones = Calificacion::query();
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

    $calificaciones->join('carreras', 'calificacions.Carrera_id', '=', 'carreras.IdCarreras')
        ->join('users', 'calificacions.Alumno_id', '=', 'users.id');

    if ($filtroCarrera) {
        $calificaciones->where('carreras.IdCarreras', $filtroCarrera);
    }
    if ($filtroAlumno) {
        $calificaciones->where('users.id', $filtroAlumno);
    }
    if ($filtroSemestre) {
        $calificaciones->where('Semester', $filtroSemestre);
    }
    if ($filtroSalon) {
        $calificaciones->where('salon', $filtroSalon);
    }

    if ($filtroTurno) {
        $calificaciones->where('turno', $filtroTurno);
    }

    

    if ($user->hasRole('Maestro')) {
        // If the user is a teacher, show only the calificaciones assigned to them
        $calificaciones->where('Maestro', $user->name);
    } elseif ($user->hasRole('Alumno')) {
        // If the user is an alumno, show only their own calificaciones
        $calificaciones->where('Alumno_id', $user->id);
    }

    if ($user->hasRole('Administrador')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
    } elseif ($user->hasRole('Maestro')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
    } else {
        $alumnos = collect([$user]);
    }

    $cantidadAlumnos = Calificacion::select(
        'Materia_id',
        'salon',
        DB::raw('MIN(IdCalificacions) as IdCalificacions'), // Asegura un ID único
        DB::raw('count(Alumno_id) as student_count')
    )
    ->groupBy('Materia_id', 'salon');

    if ($user->hasRole('Maestro')) {
        $cantidadAlumnos->where('Maestro', $user->name);
    }

    $cantidadAlumnos = $cantidadAlumnos->get();

    $calificaciones = $calificaciones->paginate(10)->appends($request->all());

    return view('Calificaciones.grupoMateria', compact('calificaciones', 'materias', 'carreras', 'materiaId', 'filtroCarrera', 'filtroTurno', 'filtroSalon', 'filtroAlumno', 'filtroSemestre', 'alumnos', 'cantidadAlumnos'));
}


public function editarCalificaciones(Request $request, $id)
{
     // Find the specific calificacion by ID
    $calificacion = Calificacion::find($id);
if (!$calificacion) {
    return redirect()->back()->with('error', 'Calificación no encontrada.');
}

    
    // Get the current logged-in user
    $currentUser = $request->user();
    
    // Get all permissions (this might be useful for view-based restrictions)
    $permission = Permission::get();
    
    // Get all carreras, materias, semestres, maestros, and añoSemestres
    $carreras = Carrera::all();
    $materias = Materia::all();
    $semestres = Semestre::all();
    $maestros = Maestro::all();
    $añosemestres = AñoSemestre::all();
    
    // Get all unidades related to the selected calificacion
    $unidades = CalificacionUnidad::where('Alumno_id', $calificacion->Alumno_id)
                      ->where('Materia_id', $calificacion->Materia_id)
                      ->where('Carrera_id', $calificacion->Carrera_id)
                      ->get();
    
    // Fetch students for the selected subject and group
    $alumnosEnMateriaYGrupo = User::join('calificacions', 'users.id', '=', 'calificacions.Alumno_id')
        ->where('calificacions.Materia_id', $calificacion->Materia_id)
        ->where('calificacions.salon', $calificacion->salon)
        ->where('calificacions.Carrera_id', $calificacion->Carrera_id)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })
        ->when($currentUser->hasRole('Maestro'), function ($query) use ($currentUser) {
            $query->where('calificacions.Maestro', $currentUser->name);
        
        })->when($currentUser->hasRole('Alumno'), function ($query) use ($currentUser) {
            $query->where('calificacions.Alumno_id', $currentUser->id);
        })->get();
    
    // Determine which students to show based on the user's role
    if ($currentUser->hasRole('Administrador')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
    } elseif ($currentUser->hasRole('Maestro')) {
        $alumnos = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
    } else {
        $alumnos = collect([$currentUser]);
    }

    // Prepare data for units (unidades) related to the calificacion
    $unidadData = [];
foreach ($alumnosEnMateriaYGrupo as $alumno) {
    $unidades = CalificacionUnidad::where('Alumno_id', $alumno->Alumno_id)
                      ->where('Materia_id', $calificacion->Materia_id)
                      ->where('Carrera_id', $calificacion->Carrera_id)
                      ->get();
    
    foreach ($unidades as $unidad) {
        $numeroUnidadArray = explode(',', $unidad->NumeroUnidad);
        $calificacionParcialArray = explode(',', $unidad->Calificacion_Parcial);
    
        foreach ($numeroUnidadArray as $index => $numeroUnidad) {
            $unidadData[$alumno->id][] = [
                'NumeroUnidad' => trim($numeroUnidad),
                'Calificacion_Parcial' => isset($calificacionParcialArray[$index]) ? trim($calificacionParcialArray[$index]) : null,
            ];
        }
    }
}

    return view('Calificaciones.editarCalificaciones', compact(
        'permission', 
        'currentUser', 
        'alumnos', 
        'materias', 
        'maestros',
        'carreras', 
        'calificacion', 
        'añosemestres', 
        'semestres',  
        'unidadData',
        'alumnosEnMateriaYGrupo' // Pass the filtered students to the view
    ));
    }


public function actualizar(Request $request, $id)
{
    try {
        // Validar datos de entrada
        $request->validate([
            'Calificaciones.*' => 'required|numeric|between:0,100', 
        ]);

        $calificacion = Calificacion::find($id);

        if (!$calificacion) {
            return response()->json(['success' => false, 'message' => 'No se pudo encontrar la calificación que intenta actualizar.'], 404);
        }

        // Calcular la calificación final
        $calificaciones = $request->input('Calificaciones', []);
        $totalUnidades = count($calificaciones);
        $calificacion->Calificacion_Final = $totalUnidades > 0 ? array_sum($calificaciones) / $totalUnidades : 0;

        $calificacion->save();

        // Preparar datos para actualizar o crear la entidad `Unidad`
        $unidadesConcatenadas = [];
        $calificacionesConcatenadas = [];

        foreach ($calificaciones as $index => $calificacionValue) {
            $unidadesConcatenadas[] = 'Unidad ' . ($index + 1);
            $calificacionesConcatenadas[] = $calificacionValue;
        }

        // Convertir arrays a strings
        $unidadesString = implode(', ', $unidadesConcatenadas);
        $calificacionesString = implode(', ', $calificacionesConcatenadas);

        // Buscar si existe una entidad `Unidad` con los mismos `Alumno_id`, `Materia_id` y `Carrera_id`
        $unidad = CalificacionUnidad::where('Alumno_id', $request->input('Alumno_id'))
                        ->where('Materia_id', $request->input('Materia_id'))
                        ->where('Carrera_id', $request->input('Carrera_id'))
                        ->first();

        if ($unidad) {
            // Si existe, actualizarla
            $unidad->NumeroUnidad = $unidadesString;
            $unidad->Calificacion_Parcial = $calificacionesString;
            $unidad->save();
        } else {
            // Si no existe, crearla
            CalificacionUnidad::create([
                'NumeroUnidad' => $unidadesString,
                'Calificacion_Parcial' => $calificacionesString,
                'Alumno_id' => $request->input('Alumno_id'),
                'Materia_id' => $request->input('Materia_id'),
                'Carrera_id' => $request->input('Carrera_id'),
            ]);
        }

        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        // Registra el error
        \Log::error('Error al actualizar calificaciones: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Error al actualizar calificaciones.'], 500);
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $calificacion = Calificacion::findOrFail($id);

    CalificacionUnidad::where('Alumno_id', $calificacion->Alumno_id)
        ->where('Materia_id', $calificacion->Materia_id)
        ->where('Carrera_id', $calificacion->Carrera_id)
        ->delete();

    $calificacion->delete();

    return redirect()->route('Calificaciones.index')
        ->with('success', 'Calificación eliminada exitosamente.');
}
}
