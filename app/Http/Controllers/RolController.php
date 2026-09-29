<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RolController extends Controller
{
    function __construct()
    {   //Agregamos los permisos que hemos definido 
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol|Alumno-rol|Maestro-rol"', ['only' => ['index']]);
        $this->middleware('permission:crear-rol', ['only' => ['create','store']]);
        $this->middleware('permission:editar-rol', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);

        // Permiso para que el alumno pueda agregar, editar y borrar sus propias calificaciones
        $this->middleware('permission:ver-calificaciones', ['only' => ['index']]);
        $this->middleware('permission:agregar-calificacion', ['only' => ['create','store']]);
        $this->middleware('permission:editar-calificacion', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-calificacion', ['only' => ['destroy']]);

        // Permiso para que el alumno pueda agregar, editar y borrar sus propias calificaciones
        $this->middleware('permission:ver-materias|ver-maestros|ver-calificaciones', ['only' => ['index']]);

        //$this->middleware('permission:gestionar-propia-calificacion', ['only' => ['index', 'create','store', 'edit','update', 'destroy']]);

    

        // Asignar permisos específicos al rol de alumno
        $alumno = Role::where('name', 'Alumno')->first();
        $alumno->syncPermissions(['ver-calificaciones', 'editar-calificacion', 'borrar-calificacion','agregar-calificacion','crear-rol', 'editar-rol','borrar-rol', 'Alumno-rol']);

        $alumnoRole = Role::findByName('Alumno');
        $maestroRole = Role::findByName('Maestro');
        $administradorRole = Role::findByName('Administrador');
        
        
        $verCalificaciones = Permission::find('ver-calificaciones');
        $agregarCalificacion = Permission::find('agregar-calificacion');
        $editarCalificacion = Permission::find('editar-calificacion');
        $borrarCalificacion = Permission::find('borrar-calificacion');
        $alumnoRole->givePermissionTo( $verCalificaciones, $editarCalificacion, $agregarCalificacion, $borrarCalificacion);
        $maestroRole->givePermissionTo( $verCalificaciones, $editarCalificacion, $agregarCalificacion, $borrarCalificacion);
        $administradorRole->givePermissionTo( $verCalificaciones, $editarCalificacion, $agregarCalificacion, $borrarCalificacion);

 
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
         //Con paginación
         $roles = Role::paginate(5);
         return view('roles.index',compact('roles'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $roles->links() !!} 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.crear',compact('permission')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index');                        
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
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.editar',compact('role','permission','rolePermissions'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index');                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');                        
    }
}
