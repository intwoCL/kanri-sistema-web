<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInDetalleProveedorProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_detalle_proveedor_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proveedores')->references('id')->on('sis_proveedor');
            $table->foreignId('id_productos')->references('id')->on('in_producto');
            $table->double('precio')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_detalle_proveedor_producto');
    }
}
