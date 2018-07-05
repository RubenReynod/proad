<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('observacion',300);
            $table->date('fecha');
            $table->integer('id_avance')->unsigned();
            $table->integer('id_profesor')->unsigned();
            //Relations
            $table->foreign('id_avance')->references('id')->on('avances_programaticos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('id_profesor')->references('codigo')->on('profesores');   

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
        Schema::dropIfExists('observaciones');
    }
}
