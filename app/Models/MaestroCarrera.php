<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MaestroCarrera extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'IdMaestroCarreras';
    protected $fillable = ['Maestro_id', 'Carrera_id'];
 
    //Creamos una funcion se relaciona con tabla maestros
    public function maestros(){
        return $this->belongsTo(maestro::class, 'IdMaestros', 'Maestro_id');
    }

}
