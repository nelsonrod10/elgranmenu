<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatosDelDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos_del_dias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('restaurante_id')->unsigned();
            $table->string('nombre');
            $table->longText('descripcion');
            $table->enum('plato_tipo', ['tradicional','vegetariano','vegano']);
            $table->string('precio');
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
        Schema::dropIfExists('platos_del_dias');
    }
}
