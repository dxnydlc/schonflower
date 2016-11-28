<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdPromoDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promocion_detalles', function (Blueprint $table) {
            $table->integer('id_promo')->after('id')->nullable();
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
