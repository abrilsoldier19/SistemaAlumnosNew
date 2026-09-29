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

class FormatoAnexo14 extends Model
{
    use HasFactory;
    protected $table = 'formatoanexo14';
    public $timestamps = false;

    protected $primaryKey = 'IdFormato14';
    protected $fillable = ['Alumno_id', 'Materia_id', 'Maestro','Semestre_id', 'Carrera_id', 'Turno', 'Salon', 'NumeroUnidad','Calificacion_Parcial','observaciones'];
    
   
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
        return $this->hasOne(semestre::class, 'IdSemestres','Semestre_id');
    }

     //Creamos una funcion se relaciona con tabla carreras
     public function carreras(){
        return $this->hasOne(carrera::class , 'IdCarreras','Carrera_id');//retornamos una relacion
    }

    public function maestros(){
        return $this->hasOne(Maestro::class, 'IdMaestros','Maestro');
    }

}
