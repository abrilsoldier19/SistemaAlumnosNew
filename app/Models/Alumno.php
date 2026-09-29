<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'IdAlumnos';
    protected $fillable = ['nombre', 'correo', 'materia', 'maestro', 'semestre','calificacion_final','carrera'];

    public function calificaciones()
{
    return $this->hasMany(Calificacion::class);
}

public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function maestro()
{
    return $this->belongsTo(Maestro::class, 'maestro');
}



}
