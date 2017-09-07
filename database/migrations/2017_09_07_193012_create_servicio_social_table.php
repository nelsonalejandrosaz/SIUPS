<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('servicio_social', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('tutor_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
            $table->string('fecha_ingreso');
            $table->string('fecha_fin');
            $table->float('monto');
            $table->string('beneficiarios_directos');
            $table->string('beneficiarios_indirectos');
            $table->integer('estado_id')->unsigned();
            $table->integer('horas_totales');
            $table->integer('numero_estudiantes');
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
        //
    }
}
