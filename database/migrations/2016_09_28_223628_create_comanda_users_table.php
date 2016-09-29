<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComandaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pedido')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('usuario')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->text('direccion')->nullable();

            $table->string('razon_social')->nullable();
            $table->string('ruc')->nullable();

            $table->decimal('total', 10, 2)->nullable();;
            $table->text('semilla')->nullable();

            $table->string('forma_pago')->nullable();

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
        Schema::drop('comanda_user');
    }
}
