<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedienteServiciosocials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_serviciosocials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expediente_alumno_id');
            $table->integer('servicio_social_id');
            $table->integer('horas_ganadas');
            $table->integer('estado_ss_estudiante');
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
        Schema::dropIfExists('expediente_serviciosocials');
    }
}
