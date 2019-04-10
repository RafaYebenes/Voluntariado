<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPuntuacionUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuacionUsuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_voluntario')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('puntuacion')->unsigned();
            $table->foreign('id_voluntario')->references('id')->on('voluntario');
            $table->foreign('id_usuario')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntuacionUsuario');
    }
}
