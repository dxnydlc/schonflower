<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuHoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_hoy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_combo')->nullable();
            $table->string('combo', 100)->nullable();
            $table->decimal('precio', 5, 2)->nullable();
            $table->date('fecha');
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
        Schema::drop('menu_hoy');
    }
}
