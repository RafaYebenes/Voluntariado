<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAsociacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('asociacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('direccion',250);
            $table->string('pais',50);
            $table->string('provincia',50);
            $table->string('poblacion',100);
            $table->integer('cp')->unsigned();
            $table->string('email',50)->unique;
            $table->string('password', 250);
            $table->string('web',50);
            $table->integer('telefono')->unsigned();
            $table->timestamp('fechaAlta');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asociacion');
    }
}
