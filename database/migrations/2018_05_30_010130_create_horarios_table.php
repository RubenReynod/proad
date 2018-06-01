<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->enum('dia',['Lunes','Martes','Miercoles','Juevez','Viernes']);
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('id_avance');
            $table->timestamps();

            //Relations
            $table->foreign('id_avance')->references('id')->on('avances_programaticos')
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
        Schema::dropIfExists('horarios');
    }
}
