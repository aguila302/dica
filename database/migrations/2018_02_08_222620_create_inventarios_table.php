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
            $table->unsignedInteger('cuerpo_id');
            $table->unsignedInteger('elemento_id');
            $table->unsignedInteger('tipo_elemento_id');
            $table->unsignedInteger('condicion_id');
            $table->decimal('longitud_elemento', 8, 2);
            $table->unsignedInteger('carril_id');
            $table->integer('cadenamiento_inicial');
            $table->integer('cadenamiento_final');
            $table->boolean('reportar');
            $table->text('observaciones');
            $table->text('recomendaciones');
            $table->string('estatus');
            $table->string('seguimiento');

            $table->foreign('autopista_id')
                ->references('id')->on('autopistas')
                ->onDelete('cascade');

            $table->foreign('cuerpo_id')
                ->references('id')->on('cuerpos')
                ->onDelete('cascade');

            $table->foreign('elemento_id')
                ->references('id')->on('elementos')
                ->onDelete('cascade');

            $table->foreign('tipo_elemento_id')
                ->references('id')->on('tipo_elementos')
                ->onDelete('cascade');

            $table->foreign('condicion_id')
                ->references('id')->on('condicions')
                ->onDelete('cascade');

            $table->foreign('carril_id')
                ->references('id')->on('carrils')
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
