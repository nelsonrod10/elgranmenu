<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('administrador_id')->unsigned();
            $table->string('nombre');
            $table->bigInteger('nit')->unique()->unsigned();
            $table->bigInteger('telefono')->unsigned();
            $table->string('direccion')->unique();
            $table->string('ciudad');
            $table->string('web')->unique();
            $table->enum('Tradicional', ['si', 'no']);
            $table->enum('Vegetariano', ['si', 'no']);
            $table->enum('Vegano', ['si', 'no']);
            $table->timestamps();
            $table->foreign('administrador_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
