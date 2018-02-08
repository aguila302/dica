<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutopistaElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autopista_elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('autopista_id');
            $table->unsignedInteger('elemento_id');

            $table->foreign('autopista_id')
                ->references('id')->on('autopistas')
                ->onDelete('cascade');

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
        Schema::dropIfExists('autopista_elementos');
    }
}
