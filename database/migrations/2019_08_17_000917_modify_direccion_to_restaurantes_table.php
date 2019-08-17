<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDireccionToRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurantes', function (Blueprint $table) {
            $table->dropColumn("direccion");
        });
        
        Schema::table('restaurantes', function (Blueprint $table) {
            $table->string("direccion");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurantes', function (Blueprint $table) {
            $table->string("direccion");
        });
    }
}
