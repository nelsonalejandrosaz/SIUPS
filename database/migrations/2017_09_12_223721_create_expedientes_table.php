<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_escuela_id')->unsigned();
            $table->date('fecha_apertura')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('totalHoras')->nullable();
            $table->integer('totalMontos')->nullable();
            $table->integer('estado_expediente_id')->unsigned();
            $table->boolean('certificado')->nullable();
            $table->string('ingresadoPor')->nullable();
            $table->string('modificadoPor')->nullable(); 
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
        Schema::dropIfExists('expedientes');
    }
}
