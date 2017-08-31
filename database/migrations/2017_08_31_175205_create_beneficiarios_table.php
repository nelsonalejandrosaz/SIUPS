<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dui');
            $table->string('correo')->nulleable();
            $table->string('telefono')->nulleable();
            $table->string('organizacion')->nulleable();
            $table->string('telefonoOrganizacion')->nulleable();
            $table->string('correoOrganizacion')->nulleable();
            $table->string('direccionOrganizacion')->nulleable();
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
        Schema::dropIfExists('beneficiarios');
    }
}
