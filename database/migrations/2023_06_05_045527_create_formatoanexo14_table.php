<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatoanexo14Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatoanexo14', function (Blueprint $table) {
            $table->id('IdFormato14');
            $table->unsignedBigInteger('Alumno_id')->constrained('users'); 
            $table->unsignedBigInteger('Materia_id'); //agregamos id materia
            $table->string('Maestro');  //relacion maestro
            $table->text('observaciones')->nullable();
            $table->double('U1');
            $table->double('U2');
            $table->double('U3');
            $table->double('U4');
            $table->double('U5');
            $table->double('U6');
            $table->double('U7');
            $table->double('U8');
            $table->unsignedBigInteger('Semestre_id'); //relacion semestre
            $table->unsignedBigInteger('Carrera_id');  //relacion carrera
            $table->string('Turno');  //relacion turno
            $table->string('Salon');  //relacion turno

            $table->foreign('Alumno_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('Materia_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('IdMaterias')
            ->on('materias')
            ->onDelete('cascade');
            $table->foreign('Semestre_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('IdSemestres')
            ->on('semestres')
            ->onDelete('cascade');
            $table->foreign('Carrera_id') //Con estas lineas se relaciona el id de la tabla carreras
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
        Schema::dropIfExists('formatoanexo14');
    }
}
