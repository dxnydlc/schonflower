<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirecionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcion_usuario', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_usuario')->nullable();
            $table->string('usuario')->nullable();

            $table->string('ubigeo')->nullable();
            $table->string('distrito')->nullable();
            $table->string('direccion')->nullable();
            $table->string('piso')->nullable();
            $table->string('interior')->nullable();
            $table->string('telefono')->nullable();
            $table->text('comentarios')->nullable();
            $table->softDeletes();

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
        Schema::drop('direcion_usuario');
    }
}
