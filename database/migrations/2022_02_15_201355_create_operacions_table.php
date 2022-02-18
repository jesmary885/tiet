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
            $table->date('fecha_i_toquelar_ident');
            $table->date('fecha_f_toquelar_ident');
            $table->date('fecha_i_limpiar_reb');
            $table->date('fecha_f_limpiar_reb');
            $table->date('fecha_i_prot_tub');
            $table->date('fecha_f_prot_tub');
            $table->date('fecha_i_alm');
            $table->date('fecha_f_alm');
            $table->date('fecha_i_ranura');
            $table->date('fecha_f_ranura');
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
