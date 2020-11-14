<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatossensoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datossensores', function (Blueprint $table) {
            $table->UnsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('id_canal');
            $table->foreign('id_canal')->references('id_user')->on('canales');
            $table->float('dato');
            $table->dateTime('fecha');
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
        Schema::dropIfExists('datossensores');
    }
}
