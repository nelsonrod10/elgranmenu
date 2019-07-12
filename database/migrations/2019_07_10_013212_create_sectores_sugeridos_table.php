<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectoresSugeridosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectores_sugeridos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre")->unique();
            $table->enum("tipo",["Zona o Sector","Plaza de Mercado", "Centro Comercial", "Plazoleta de Comidas"]);
            $table->string("direccion")->nullable()->unique();
            $table->string("limite_1")->nullable();
            $table->string("limite_2")->nullable();
            $table->string("limite_3")->nullable();
            $table->string("limite_4")->nullable();
            $table->string("ciudad");
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
        Schema::dropIfExists('sectores_sugeridos');
    }
}
