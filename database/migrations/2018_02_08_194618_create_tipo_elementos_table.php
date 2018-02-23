<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 200);
            $table->unsignedInteger('elemento_id');

            $table->foreign('elemento_id')
                ->references('id')->on('elementos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('sub_elementos');
    }
}
