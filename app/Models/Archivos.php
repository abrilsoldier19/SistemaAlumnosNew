<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'archivos';
    protected $fillable = [
        'Alumno_id',
        'file_path'
    ];

    public function alumnos(){
        return $this->hasOne(user::class, 'id','Alumno_id');
    }
}
