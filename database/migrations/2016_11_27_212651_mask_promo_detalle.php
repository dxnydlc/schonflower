<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaskPromoDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promocion_detalles', function (Blueprint $table) {
            $table->text('mascara')->after('precio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promocion_detalles', function (Blueprint $table) {
            //
        });
    }
}
