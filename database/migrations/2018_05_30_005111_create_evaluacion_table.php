<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_programada');
            $table->date('fecha_real');
            $table->integer('id_subtemas');
            $table->timestamps();

            //Relations
            $table->foreign('id_subtemas')->references('id')->on('subtemas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion');
    }
}
