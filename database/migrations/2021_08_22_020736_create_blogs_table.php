<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {            //si se quire cambiar a otro se cambia el texo 'blogs' por otro por ejemplo productos, atriculos etc...
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // se crean las columnas 
            $table->text('contenido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
