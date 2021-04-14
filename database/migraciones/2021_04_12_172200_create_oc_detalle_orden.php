<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcDetalleOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_detalle_orden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->references('id')->on('in_prodcuto');
            $table->foreignId('id_proveedor_producto')->references('id')->on('in_detalle_proveedor_producto');
            $table->foreignId('id_orden_compra')->references('id')->on('oc_orden_compra');
            $table->integer('cantidad');
            $table->integer('cantidad_recivida');
            $table->double('precio')->default(0);
            $table->double('total')->default(0);
            $table->boolean('chequeo')->default(false);
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
        Schema::dropIfExists('oc_detalle_orden');
    }
}
