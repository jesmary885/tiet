<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha_i_fase1');
            $table->date('fecha_i_fase2');
            $table->date('fecha_i_fase3');
            $table->date('fecha_i_fase4');
            $table->date('fecha_i_fase5');
            $table->string('fase1');
            $table->string('fase2');
            $table->string('fase3');
            $table->string('fase4');
            $table->string('fase5');
            $table->unsignedBigInteger('almacen_id');
            $table->foreign('almacen_id')->references('id')->on('almacens');
            
            $table->unsignedBigInteger('orden_produccion_id');
            $table->foreign('orden_produccion_id')->references('id')->on('orden_produccions')->onDelete('CASCADE');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operacions');
    }
}
