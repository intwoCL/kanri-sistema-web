<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_factura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_compania')->references('id')->on('sis_compania');
            $table->integer('id_cliente')->nullable();
            $table->foreignId('id_usuario')->references('id')->on('sis_usuario');
            $table->datetime('fecha_emision');
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('subtotal');
            $table->double('total');
            $table->float('descuento')->default(0);
            $table->float('iva')->default(0);
            $table->integer('estado');
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
        Schema::dropIfExists('fa_factura');
    }
}
