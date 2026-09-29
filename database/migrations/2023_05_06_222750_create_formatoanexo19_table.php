<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatoanexo19Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatoanexo19_table', function (Blueprint $table) {
            $table->IdFormatoAnexo19();
            $table->unsignedBigInteger('Alumno');
            $table->unsignedBigInteger('Materia');
            $table->unsignedBigInteger('Carrera');
            $table->string('Maestro'); //relacion maestro
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

            $table->foreign('Alumno') //Con estas lineas se relaciona el id de la tabla materia
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('Materia') 
            ->references('IdMaterias')
            ->on('materias')
            ->onDelete('cascade');
            $table->foreign('Carrera') 
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
        Schema::dropIfExists('formatoanexo19_table');
    }
}
