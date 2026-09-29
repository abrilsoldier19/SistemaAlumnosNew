<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos lo siguiente
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::paginate(6); //definimos variable 
        return view('Carreras.index', array('carreras'=>$carreras)); //llama la vista para ser visualizada 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('Carreras.crear',compact('permission')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreCarrera' => 'required',
            // ...resto de las validaciones
        ]);

        $carrera = new Carrera;
        $carrera->NombreCarrera = $request->input('NombreCarrera');

        
        $carrera->save();

        return redirect()->route('Carreras.index')->with('success', 'carrera creada exitosamente.');
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
    public function edit($id)
    {
        $carrera = Carrera::find($id);
        $permission = Permission::get();
        return view('Carreras.editar',compact('permission', 'carrera')); 
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
        $carrera = Carrera::find($id);
        
        if (!$carrera) 
        {
            return redirect()->route('Carreras.index')->with('error', 'No se pudo encontrar la carrera que intenta actualizar.');
        }
    
        $carrera->NombreCarrera = $request->input('NombreCarrera');
        
        $carrera->save();

        return redirect()->route('Carreras.index')->with('success', 'Carrera actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carrera::find($id)->delete();
        return redirect()->route('Carreras.index');
    }
}
