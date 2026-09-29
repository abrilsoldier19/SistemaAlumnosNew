<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;
//agregamos lo siguiente
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $semestres = Semestre::paginate(5)->appends($request->all()); //definimos variable
        return view('Semestres.index', array('semestres'=>$semestres)); //llama la vista para ser visualizada
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('Semestres.crear',compact('permission'));
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
            'Semestre' => 'required',
            // ...resto de las validaciones
        ]);

        $semestre = new Semestre;
        $semestre->Semestre = $request->input('Semestre');

        
        $semestre->save();

        return redirect()->route('Semestres.index')->with('success', 'semestre creada exitosamente.');
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
        $semestre = Semestre::findOrFail($id);
        $permission = Permission::get();
        return view('Semestres.editar',compact('permission', 'semestre')); 
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
        $semestre = Semestre::find($id);
        
        if (!$semestre) 
        {
            return redirect()->route('Semestres.index')->with('error', 'No se pudo encontrar el semestre que intenta actualizar.');
        }
    
        $semestre->Semestre = $request->input('Semestre');
        
        $semestre->save();

        return redirect()->route('Semestres.index')->with('success', 'Semestre actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Semestre::find($id)->delete();//corregir
        return redirect()->route('Semestres.index');
    }
}
