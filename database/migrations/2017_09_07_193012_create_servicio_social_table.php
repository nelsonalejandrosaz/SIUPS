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
            $table->integer('tutor_id')->unsigned()->nullable();
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
            $table->date('fecha_ingreso');
            $table->date('fecha_fin')->nullable();
            $table->float('monto')->nullable();
            $table->integer('beneficiarios_directos')->nullable();
            $table->integer('beneficiarios_indirectos')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->integer('horas_totales')->nullable();
            $table->integer('numero_estudiantes');
            $table->integer('modalidad_id')->unsigned();
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
