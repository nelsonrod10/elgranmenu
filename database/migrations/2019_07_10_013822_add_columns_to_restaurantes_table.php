<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurantes', function (Blueprint $table) {
            $table->string("sector_id")->nullable()->after("ciudad");
            $table->string("local")->nullable()->after("ciudad");
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
            $table->dropColumn("sector_id");
            $table->dropColumn("local");
        });
    }
}
