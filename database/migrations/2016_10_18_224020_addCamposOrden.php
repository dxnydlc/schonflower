<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_usuario', function (Blueprint $table) {
            $table->integer('id_dir')->after('telefono')->nullable();
            $table->string('estado', 100)->after('tipo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_usuario', function (Blueprint $table) {
            //
        });
    }
}
