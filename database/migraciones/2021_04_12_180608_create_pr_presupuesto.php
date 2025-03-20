<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrPresupuesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_presupuesto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('sis_usuario');
            $table->integer('id_cliente')->nullable(0);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_termino');
            $table->string('glosa');
            $table->double('subtotal')->default(0);
            $table->float('iva')->default(0);
            $table->double('total')->default(0);
            $table->integer('estado');
            $table->integer('contador_correos');
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
        Schema::dropIfExists('pr_presupuesto');
    }
}
