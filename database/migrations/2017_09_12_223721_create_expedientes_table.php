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
            $table->text('observaciaciones')->nullable();
            $table->integer('totalHoras')->nullable();
            $table->integer('totalMontos')->nullable();
            $table->string('estado');
            $table->string('carnet');
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
