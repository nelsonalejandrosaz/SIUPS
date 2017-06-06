<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carnet',7)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('direccion',50);
            $table->string('telefono',50);
            $table->string('correo',50);
            $table->string('lugar_trabajo',50);
            $table->string('telefono_trabajo',50); 
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
        Schema::dropIfExists('alumnos');
    }
}
