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
        //CREAR TABLA USUARIO
        Schema::create('usuario', function (Blueprint $table) {

            $table->engine="InnoDB";//BORRAR DATOS EN CASCADA
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('genero_id')->unsigned();
            $table->string('fecha_nacimiento');
            $table->bigInteger('cargo_id')->unsigned();
            $table->string('fecha_ingreso');
            $table->bigInteger('rol_id')->unsigned();
            $table->timestamps();

            $table->foreign('genero_id')->references('id')->on('genero')->onDelete("cascade");
            $table->foreign('cargo_id')->references('id')->on('cargo')->onDelete("cascade");
            $table->foreign('rol_id')->references('id')->on('rol')->onDelete("cascade");
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
