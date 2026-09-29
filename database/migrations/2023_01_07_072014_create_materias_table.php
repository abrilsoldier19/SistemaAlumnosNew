<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id('IdMaterias');
            $table->string('NombreMateria');
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('semestre_id'); //agregamos el campo donde se visualizara la relacion
            $table->foreign('carrera_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('IdCarreras')
            ->on('carreras')
            ->onDelete('cascade');
            $table->foreign('semestre_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('IdSemestres')
            ->on('semestres')
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
        Schema::dropIfExists('materias');
    }
}
