<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_usuario', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_usuario')->nullable();
            $table->string('usuario')->nullable();
            $table->char('actual', 4)->default('0');

            $table->string('ubigeo')->nullable();
            $table->string('distrito')->nullable();
            $table->string('direccion')->nullable();
            $table->string('piso')->nullable();
            $table->string('interior')->nullable();
            $table->string('telefono')->nullable();
            $table->text('comentarios')->nullable();
            $table->text('token')->nullable();
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
        Schema::drop('direccion_usuario');
    }
}
