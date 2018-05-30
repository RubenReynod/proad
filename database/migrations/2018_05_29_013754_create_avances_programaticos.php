<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvancesProgramaticos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avances_programaticos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_nrc',11)->unsigned();
            $table->integer('id_ciclo',6)->unsigned();
            $table->timestamps();

            //Relations
            $table->foreign('id_nrc')->references('id')->on('nrc');
            $table->foreign('id_ciclo')->references('id')->on('ciclo');
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
