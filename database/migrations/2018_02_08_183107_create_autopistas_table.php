<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutopistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autopistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200);
            $table->unsignedDecimal('cadenamiento_inicial_km', 3, 0);
            $table->unsignedDecimal('cadenamiento_inicial_m', 3, 0);
            $table->unsignedDecimal('cadenamiento_final_km', 3, 0);
            $table->unsignedDecimal('cadenamiento_final_m', 3, 0);
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
        Schema::dropIfExists('autopistas');
    }
}
