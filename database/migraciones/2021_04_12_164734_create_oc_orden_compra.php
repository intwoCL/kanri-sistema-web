<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcOrdenCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_orden_compra', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_orden')->unique();
            $table->foreignId('id_proveedor')->references('id')->on('sis_proveedor');
            $table->foreignId('id_usuario')->references('id')->on('sis_usuario');
            $table->datetime('fecha_emision');
            $table->datetime('fecha_entrega')->nullable();
            $table->string('comentario')->nullable();
            $table->float('descuento')->default(0);
            $table->float('iva')->default(0);
            $table->double('subtotal')->default(0);
            $table->double('total')->default(0);
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('oc_orden_compra');
    }
}
