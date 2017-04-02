<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ordens', function (Blueprint $table) {
            #
            $table->increments('id');
            #
            $table->integer('id_orden')->nullable();
            $table->integer('id_menu')->nullable();
            $table->string('tipo_menu')->nullable();
            #
            $table->integer('id_plato')->nullable();
            $table->string('plato')->nullable();
            #
            $table->string('lote')->nullable();
            $table->string('sku')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            #
            $table->text('token')->nullable();
            #
            $table->softDeletes();
            $table->timestamps();
            #
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_ordens');
    }
}
