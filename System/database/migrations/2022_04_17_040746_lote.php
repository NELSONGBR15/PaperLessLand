<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREAR TABLA LOTE
        Schema::create('lote', function (Blueprint $table) {

            $table->engine="InnoDB";//BORRAR DATOS EN CASCADA
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('anio_siembra');
            $table->bigInteger('variedad_id')->unsigned();
            $table->bigInteger('finca_id')->unsigned();
            $table->timestamps();

            $table->foreign('variedad_id')->references('id')->on('variedad')->onDelete("cascade");
            $table->foreign('finca_id')->references('id')->on('finca')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
