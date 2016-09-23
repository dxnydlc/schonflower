<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->nullable();
            $table->string('producto', 100)->nullable();
            $table->decimal('precio', 5, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->integer('id_categoria')->nullable();
            $table->string('categoria', 100)->nullable();
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
        Schema::drop('detalle_menus');
    }
}
