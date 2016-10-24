<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmpresaOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_usuario', function (Blueprint $table) {
            $table->integer('id_empresa')->after('usuario')->nullable();
            $table->string('empresa')->after('id_empresa')->nullable();
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
