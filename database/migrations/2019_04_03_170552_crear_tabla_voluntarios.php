<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVoluntarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('apellidos',50);
            $table->datetime('edad');
            $table->string('email',50)->unique();
            $table->string('password',250);
            $table->integer('telefono')->unsigned();
            $table->integer('puntuacion')->unsigned();
            $table->string('avatar',250);
            $table->float('latitud');
            $table->float('longitud');
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
        Schema::dropIfExists('voluntario');
    }
}
