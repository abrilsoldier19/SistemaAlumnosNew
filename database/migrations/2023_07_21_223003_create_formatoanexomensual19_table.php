<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatoanexomensual19Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatoanexomensual19', function (Blueprint $table) {
            $table->Alumno_id();
            $table->unsignedBigInteger('NombreAlumno');
            $table->unsignedBigInteger('NombreMateria');
            $table->unsignedBigInteger('NombreCarrera');
            $table->string('NombreMaestro'); //relacion maestro
            $table->string('Semestre'); //relacion semestre
            $table->string('turno');  //relacion turno
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamps();
            $table->string('salon');  //relacion turno
            $table->text('comentarios')->nullable();
            $table->tinyInteger('checkpoint1')->default(0);
            $table->tinyInteger('checkpoint2')->default(0);
            $table->tinyInteger('checkpoint3')->default(0);

            $table->foreign('NombreAlumno') //Con estas lineas se relaciona el id de la tabla materia
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('NombreMateria') 
            ->references('IdMaterias')
            ->on('materias')
            ->onDelete('cascade');
            $table->foreign('NombreCarrera') 
            ->references('IdCarreras')
            ->on('carreras')
            ->onDelete('cascade');
            $table->foreign('NombreMaestro') 
            ->references('IdMaestros')
            ->on('maestros')
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
        Schema::dropIfExists('formatoanexomensual19');
    }
}
