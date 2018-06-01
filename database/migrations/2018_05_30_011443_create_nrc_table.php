<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNrc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nrc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_profesor');
            $table->timestamps();

            //Relations
            $table->foreign('id_profesor')->references('id')->on('profesores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nrc');
    }
}
