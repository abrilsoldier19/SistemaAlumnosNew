<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatos', function (Blueprint $table) {
            $table->id('IdFormatos');
            $table->unsignedBigInteger('calificacion_id');
            $table->text('observaciones');

            $table->foreign('calificacion_id') //Con estas lineas se relaciona el id de la tabla carreras
            ->references('IdCalificacions')
            ->on('calificacions')
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
        Schema::dropIfExists('formatos');
    }
}
