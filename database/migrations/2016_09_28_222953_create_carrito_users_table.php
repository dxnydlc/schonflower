<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->nullable();
            $table->string('producto')->nullable();
            $table->integer('id_categoria')->nullable();
            $table->string('categoria')->nullable();
            $table->string('sku')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio', 10, 2)->nullable();;
            $table->decimal('total', 10, 2)->nullable();;
            $table->text('semilla')->nullable();
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
        Schema::drop('carrito_user');
    }
}
