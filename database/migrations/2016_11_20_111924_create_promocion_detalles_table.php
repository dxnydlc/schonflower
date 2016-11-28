<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocion_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('condicion_1', 100)->nullable();
            $table->string('condicion_2', 100)->nullable();
            $table->decimal('precio', 10, 2);
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
        Schema::drop('promocion_detalles');
    }
}
