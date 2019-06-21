<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientesPlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes_platos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('platosCarta_id')->unsigned();
            $table->string('nombre');
            $table->foreign('platosCarta_id')->references('id')->on('platos_cartas')->onDelete('cascade');    
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
        Schema::dropIfExists('ingredientes_sugeridos');
    }
}
