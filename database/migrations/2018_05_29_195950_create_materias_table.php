<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('clave',8)->unique();
            $table->string('nombre',50);
            $table->tinyInteger('creditos');
            $table->enum('edificio',['A','B','C','D','E','F','G','H','I','J','K']);
            $table->integer('id_avance')->unsigned();
            $table->integer('id_departamentos')->unsigned();
            $table->integer('id_carrera')->unsigned();
            //Relations
            $table->foreign('id_avance')->references('id')->on('avances_programaticos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('id_departamentos')->references('id')->on('departamentos');
            $table->foreign('id_carrera')->references('id')->on('carreras'); 

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
        Schema::dropIfExists('materias');
    }
}
