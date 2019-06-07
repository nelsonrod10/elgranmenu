<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('restaurante_id')->unsigned();
            $table->string('pagina_web')->unique();
            $table->string('facebook')->unique();
            $table->string('instagram')->unique();
            $table->string('domicilios_com')->unique();
            $table->string('rappi')->unique();
            $table->timestamps();
            $table->foreign('restaurante_id')->references('id')->on('restaurantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redes_sociales');
    }
}
