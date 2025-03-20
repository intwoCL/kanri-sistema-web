<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_producto', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('codigo');
            $table->string('descripcion');
            $table->double('costo_importacion')->default(0);
            $table->double('precio_credito')->default(0);
            $table->foreignId('id_categoria')->references('id')->on('in_categoria');
            $table->foreignId('id_tipo_producto')->references('id')->on('in_tipo_producto');
            $table->foreignId('id_unidad')->references('id')->on('in_unidad');
            $table->integer('stock_disponible');
            $table->integer('stock_critico');
            $table->string('foto');
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
        Schema::dropIfExists('in_producto');
    }
}
