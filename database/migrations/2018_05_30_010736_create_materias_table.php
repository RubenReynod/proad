_table<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->string('clave',8);
            $table->string('nombre',50);
            $table->integer('creditos',11);
            $table->enum('edificio',['A','B','C','D','E','F','G','H','I','J','K']);
            $table->integer('id_avance');
            $table->integer('id_departamentos');
            $table->integer('id_carrera');
            $table->timestamps();

            //Relations
            $table->foreign('id_avance')->references('id')->on('avances_programaticos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('id_departamentos')->references('id')->on('departamentos');
            $table->foreign('id_carrera')->references('id')->on('carreras');      

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
