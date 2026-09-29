<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maestro;
use App\Models\MaestroCarrera;
use App\Models\Carrera;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index(Request $request)
{
    // Para el filtro: obtener todos los maestros
    $maestros_nombre = Maestro::select('NombreMaestro')->distinct()->get();

    // Para la tabla: consulta con paginaci®Æn
    $maestrosQuery = Maestro::with('maestroCarrera');
    $filtroMaestro = $request->input('NombreMaestro');

    if ($filtroMaestro) {
        $maestrosQuery->where('NombreMaestro', $filtroMaestro);
    }

    $maestros = $maestrosQuery->paginate(10)->appends($request->all());

    return view('Maestros.index', compact('maestros', 'filtroMaestro', 'maestros_nombre'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $currentUser = $request->user();
        $carreras = Carrera::all();

        if (!$currentUser->hasRole('Administrador')) {
            return redirect()->route('Maestros.index')->with('error', 'No tienes permiso para agregar maestros.');
        }

        $permission = Permission::get();
        return view('Maestros.crear',compact('permission', 'carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    // Validaci®Æn (igual que en update)
    $request->validate([
        'NombreMaestro' => 'required|string|max:255',
        'Correos'       => 'required|email|max:255',
        'carrera_ids'   => 'required|array',
        'carrera_ids.*' => 'integer|exists:carreras,IdCarreras',
    ]);

    DB::transaction(function () use ($request) {
        // Crear maestro (si IdMaestros es autoincrement, NO lo asignes manualmente)
        $maestro = new Maestro();
        $maestro->NombreMaestro = $request->NombreMaestro;
        $maestro->Correos       = $request->Correos;
        $maestro->save();

        // Unir los IDs en la cadena "1,2,3"
        $idsComoTexto = implode(',', $request->carrera_ids);

        // Crear el registro pivote (un solo registro con la cadena)
        MaestroCarrera::create([
            'Maestro_id' => $maestro->IdMaestros,
            'Carrera_id' => $idsComoTexto,
        ]);
    });

    return redirect()
        ->route('Maestros.index')
        ->with('success', 'Maestro creado exitosamente.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit(Request $request, $id)
{
    $currentUser = $request->user();
    if (!$currentUser->hasRole('Administrador')) {
        return redirect()->route('Maestros.editar')->with('error', 'No tienes permiso para agregar maestros.');
    }

    $maestro  = Maestro::findOrFail($id);
    $carreras = Carrera::all();

    // Buscar el registro en maestro_carreras
    $registro = MaestroCarrera::where('Maestro_id', $maestro->IdMaestros)->first();

    // Convertir "1,2,3" en [1,2,3]
    $carrerasSeleccionadas = $registro ? explode(',', $registro->Carrera_id) : [];

    return view('Maestros.editar', compact('maestro', 'carreras', 'carrerasSeleccionadas'));
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
    $request->validate([
        'NombreMaestro' => 'required|string|max:255',
        'Correos'       => 'required|email|max:255',
        'carrera_ids'   => 'required|array',
        'carrera_ids.*' => 'integer|exists:carreras,IdCarreras',
    ]);

    DB::transaction(function () use ($request, $id) {
        $maestro = Maestro::findOrFail($id);
        $maestro->NombreMaestro = $request->NombreMaestro;
        $maestro->Correos       = $request->Correos;
        $maestro->save();

        // Combinar IDs en cadena "1,2,3"
        $idsComoTexto = implode(',', $request->carrera_ids);

        // Buscar registro pivote
        $registro = MaestroCarrera::where('Maestro_id', $maestro->IdMaestros)->first();

        if ($registro) {
            // Actualizar
            $registro->Carrera_id = $idsComoTexto;
            $registro->save();
        } else {
            // Crear nuevo si no existe
            MaestroCarrera::create([
                'Maestro_id' => $maestro->IdMaestros,
                'Carrera_id' => $idsComoTexto,
            ]);
        }
    });

    return redirect()->route('Maestros.index')->with('success', 'Maestro actualizado exitosamente.');
}





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maestro = Maestro::findOrFail($id);
        $maestro->delete();

        return redirect()->route('Maestros.index')->with('success', 'Calificaci√≥n eliminada exitosamente.');
    }
}
