<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_atencions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('restaurante_id')->unsigned();
            $table->enum('horario', ['Lunes a Viernes','Lunes a Sabado', 'Lunes a Domingo', 'Domingo a Domingo', 'Sabado','Domingo']);
            $table->string('apertura');
            $table->string('cierre');
            $table->enum('24_horas', ['si','no']);
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
        Schema::dropIfExists('horarios_atencions');
    }
}
