<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCervejasIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cervejas_ingredientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cerveja_id');
            $table->unsignedBigInteger('ingrediente_id');

            $table->foreign('cerveja_id')
                  ->references('id')
                  ->on('cervejas')
                  ->onDelete('cascade');
            $table->foreign('ingrediente_id')
                  ->references('id')
                  ->on('ingredientes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cervejas_ingredientes');
    }
}
