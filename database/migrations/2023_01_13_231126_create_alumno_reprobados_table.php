<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoReprobadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_reprobados', function (Blueprint $table) {
            $table->id('IdAlumno_reprobados');
            $table->unsignedBigInteger('Alumno_id');
            $table->unsignedBigInteger('Materia_id'); //agregamos id materia
            $table->unsignedBigInteger('Calif_Final_id'); //agregamos id calificacions
            $table->unsignedBigInteger('Maestro_id'); //relacion maestro
            $table->unsignedBigInteger('Semestre_id');  //relacion semestre
            $table->unsignedBigInteger('Año_id');  //relacion año curso
            $table->unsignedBigInteger('carrera_id');
            $table->string('turnos');
            $table->strings('salones');
            $table->foreign('Alumno_id') 
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('Materia_id') //Con estas lineas se relaciona el id de la tabla materia
            ->references('IdMaterias')
            ->on('materias')
            ->onDelete('cascade');
            $table->foreign('Calif_Final_id') 
            ->references('IdCalificacions')
            ->on('calificacions')
            ->onDelete('cascade');
            $table->foreign('Maestro_id') 
            ->references('IdCalificacions')
            ->on('calificacions')
            ->onDelete('cascade');
            $table->foreign('Semestre_id') 
            ->references('IdSemestres')
            ->on('semestres')
            ->onDelete('cascade');
            $table->foreign('Año_id') 
            ->references('IdAño_semestres')
            ->on('año_semestres')
            ->onDelete('cascade');
            $table->foreign('carrera_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('IdCarreras')
            ->on('carreras')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_reprobados');
    }
}
