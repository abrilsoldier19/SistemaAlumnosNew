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

class CalificacionUnidad extends Model
{
    protected $table = 'calificacion_unidad';
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'IdUnidad';
    protected $fillable = ['Alumno_id', 'Materia_id', 'NumeroUnidad','Calificacion_Parcial','Semester','Maestro','ciclo_escolar','Carrera_id', 'turno','salon'];
 

    public function calificaciones(){
        return $this->hasOne(CalificacionUnidad::class, 'IdUnidad','Calificacion_Parcial');
    } 
    public function calificacion()
    {
        return $this->belongsTo(Calificacion::class, 'Alumno_id', 'Alumno_id')
                    ->whereColumn('Materia_id', 'Materia_id');
    }
    //Creamos una funcion se relaciona con tabla users
    public function alumnos(){
        return $this->hasOne(user::class, 'id','Alumno_id');
    } //belongsToMany
    //Creamos una funcion se relaciona con tabla materias
    public function materias(){
        return $this->hasOne(materia::class, 'IdMaterias','Materia_id');
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
    public function añosemestres(){
        return $this->hasOne(añosemestre::class, 'IdAño_semestres','Añosemestre');
    }
     //Creamos una funcion se relaciona con tabla carreras
     public function carreras(){
        return $this->hasOne(carrera::class , 'IdCarreras','Carrera_id');//retornamos una relacion
    }
    public function horarios()
    {
        return $this->belongsTo(CalificacionUnidad::class, 'IdUnidad','turno');
    }

    public function salones()
    {
        return $this->belongsTo(CalificacionUnidad::class, 'IdUnidad','salon');
    }
}