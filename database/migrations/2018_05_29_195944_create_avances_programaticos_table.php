<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvancesProgramaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avances_programaticos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_nrc')->unsigned();
            $table->integer('id_ciclo')->unsigned();
            //Relations
            $table->foreign('id_nrc')->references('id')->on('nrc');
            $table->foreign('id_ciclo')->references('id')->on('ciclos');

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
        Schema::dropIfExists('avances_programaticos');
    }
}
