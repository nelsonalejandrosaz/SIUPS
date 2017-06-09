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
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('direccion',500)->nullable();
            $table->string('telefono',100)->nullable();
            $table->string('correo',100)->nullable();
            $table->string('lugar_trabajo',100)->nullable();
            $table->string('telefono_trabajo',100)->nullable(); 
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
