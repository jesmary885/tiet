<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenProduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_produccions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha');
            $table->string('cantidad');
            $table->string('diametro');
            $table->string('rosca');
            $table->string('lbs');
            $table->string('grado');
            $table->string('ext_libres');
            $table->string('ranura');
            $table->string('AA');
            $table->string('densidad_rpp');
            $table->string('maq');
            $table->string('long');
            $table->string('observaciones');
            $table->unsignedBigInteger('suplidor_id');
            $table->foreign('suplidor_id')->references('id')->on('suplidors');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('tipo_ranurado_id');
            $table->foreign('tipo_ranurado_id')->references('id')->on('tipo_ranurados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_produccions');
    }
}
