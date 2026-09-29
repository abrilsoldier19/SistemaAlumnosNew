<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//Agregamos spatie
use Spatie\Permission\Traits\HasRoles;

class Calificacion extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'calificacions';
    protected $primaryKey = 'IdCalificacions';
    protected $fillable = ['Alumno_id', 'Materia_id', 'comentarios','Calificacion_Final','Semester','Maestro','ciclo_escolar','Carrera_id', 'turno','salon'];
 

    public function calificaciones(){
        return $this->hasOne(calificacion::class, 'IdCalificacions','Calificacion_Final');
    } 
    public function unidades()
    {
        return $this->hasMany(CalificacionUnidad::class, 'Alumno_id', 'Alumno_id')
                    ->whereColumn('Materia_id', 'Materia_id');
    }

    //Creamos una funcion se relaciona con tabla users
    public function alumnos(){
        return $this->hasOne(user::class, 'id','Alumno_id');
    } //belongsToMany
    //Creamos una funcion se relaciona con tabla materias
    public function materias(){
        return $this->hasOne(Materia::class, 'IdMaterias','Materia_id');
    }
    //Creamos una funcion se relaciona con tabla semestres
    public function semestres(){
        return $this->belongsTo(semestre::class, 'IdSemestres','Semester');
    }
    //Creamos una funcion se relaciona con tabla maestros
    public function maestros(){
        return $this->hasOne(Maestro::class, 'IdMaestros','Maestro');
    }
    //Creamos una funcion se relaciona con tabla año de curso
    public function cicloescolars(){
        return $this->hasOne(añosemestre::class, 'IdAño_semestres','Añosemestre');
    }
     //Creamos una funcion se relaciona con tabla carreras
     public function carreras(){
        return $this->hasOne(carrera::class , 'IdCarreras','Carrera_id');//retornamos una relacion
    }
    public function alumnoreprobados()
    {
        return $this->hasMany(AlumnoReprobado::class, 'Calif_Final_id');
    }

    public function horarios()
    {
        return $this->belongsTo(Calificacion::class, 'IdCalificacions','turno');
    }

    public function salones()
    {
        return $this->belongsTo(Calificacion::class, 'IdCalificacions','salon');
    }
    public function comentarios()
    {
        return $this->hasOne(Formato::class, 'IdFormatos', 'calificacion_id');
    }
    public function formato()
{
    return $this->hasOne(Formato::class, 'calificacion_id', 'IdCalificacion');
}
}