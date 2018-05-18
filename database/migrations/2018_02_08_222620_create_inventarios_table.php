<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('autopista_id');
            $table->unsignedInteger('elemento_id');
            $table->unsignedInteger('subelemento_id');
            $table->unsignedInteger('cuerpo_id');
            $table->unsignedInteger('condicion_id');
            $table->unsignedInteger('carril_id');
            $table->unsignedDecimal('longitud_elemento', 8, 2)->nullable();
            $table->integer('cadenamiento_inicial_km')->nullable();
            $table->integer('cadenamiento_inicial_m')->nullable();

            $table->integer('cadenamiento_final_km')->nullable();
            $table->integer('cadenamiento_final_m')->nullable();

            $table->boolean('reportar')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->integer('estatus')->nullable();
            $table->uuid('uuid')->unique();

            $table->foreign('autopista_id')
                ->references('id')->on('autopistas')
                ->onDelete('cascade');

            $table->foreign('cuerpo_id')
                ->references('id')->on('cuerpos')
                ->onDelete('cascade');

            $table->foreign('elemento_id')
                ->references('id')->on('elementos')
                ->onDelete('cascade');

            $table->foreign('subelemento_id')
                ->references('id')->on('sub_elementos')
                ->onUpdate('cascade');

            $table->foreign('condicion_id')
                ->references('id')->on('condicions')
                ->onDelete('cascade');

            $table->foreign('carril_id')
                ->references('id')->on('carriles')
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
        Schema::dropIfExists('inventarios');
    }
}
