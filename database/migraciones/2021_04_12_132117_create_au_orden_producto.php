<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuOrdenProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('au_orden_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->references('id')->on('in_productos');
            $table->foreignId('id_usuario')->references('id')->on('sis_usuario');
            $table->dateTime('fecha_actual');
            $table->integer('cantidad_anterior');
            $table->integer('cantidad_nueva');
            $table->integer('cantidad_actual');
            $table->double('precio_actual');
            $table->double('precio_importacion');
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
        Schema::dropIfExists('au_orden_producto');
    }
}
