<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('nombre',30);
            $table->string('apellidoP',30);
            $table->string('apellidoM',30);
            $table->enum('estatus',['activo','inactivo'])->default('activo');
            $table->string('contraseña');
            $table->enum('sexo',['hombre','mujer']);
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
        Schema::dropIfExists('profesores');
    }
}
