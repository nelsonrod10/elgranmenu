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
            $table->string('nombre')->unique();
            $table->bigInteger('nit')->unique()->unsigned();
            $table->string('direccion');
            $table->string('ciudad');
            $table->string("sector_id")->nullable();
            $table->string("local")->nullable();
            $table->bigInteger('telefono')->unique()->unsigned();
            $table->bigInteger('celular')->unique()->unsigned();
            $table->enum('tradicional', ['si', 'no']);
            $table->enum('vegetariano', ['si', 'no']);
            $table->enum('vegano', ['si', 'no']);
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
