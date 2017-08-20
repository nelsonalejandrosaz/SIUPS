<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->dropForeign('user_rol_id_foreign');
            $table->dropColumn('rol_id');
        });
    }
}
