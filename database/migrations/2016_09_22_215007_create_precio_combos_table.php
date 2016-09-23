<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precio_combo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_menu')->nullable();
            $table->string('tipo_menu', 100)->nullable();
            $table->decimal('precio', 5, 2)->nullable();
            $table->date('fecha')->nullable();
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
        Schema::drop('precio_combo');
    }
}
