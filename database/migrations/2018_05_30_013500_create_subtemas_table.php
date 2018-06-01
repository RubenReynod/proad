<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->date('fecha_programada');
            $table->date('fecha_real');
            $table->string('actividad',300);
            $table->string('recursos',300);
            $table->integer('id_unidad');
            $table->timestamps();

            //Relations
            $table->foreign('id_unidad')->references('id')->on('unidad')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtemas');
    }
}
