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
        //CREAR TABLA REGISTRO
        Schema::create('registro', function (Blueprint $table) {

            $table->engine="InnoDB";//BORRAR DATOS EN CASCADA
            $table->bigIncrements('id');
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('fecha');
            $table->string('linea');
            $table->string('palma');
            $table->bigInteger('enfermedad_id')->unsigned();
            $table->bigInteger('lote_id')->unsigned();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete("cascade");
            $table->foreign('enfermedad_id')->references('id')->on('enfermedad')->onDelete("cascade");
            $table->foreign('lote_id')->references('id')->on('lote')->onDelete("cascade");
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
