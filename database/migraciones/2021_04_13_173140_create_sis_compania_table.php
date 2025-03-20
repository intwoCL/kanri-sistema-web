<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisCompaniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_compania', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('logo')->nullable();
            $table->string('run')->nullable();
            $table->string('nombre_dueno')->nullable();
            $table->string('nombre_comania')->nullable();
            $table->string('tipo')->nullable();
            $table->string('direccion')->nullable();
            $table->foreignId('id_ciudad')->references('id')->on('syis_ciudad');
            $table->string('fono')->nullable();
            $table->string('correo')->nullable();
            $table->string('sitio_web')->nullable();
            $table->json('ajustes')->nullable();
            $table->json('integraciones')->nullable();
            $table->string('colores_compania')->nullable();
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
        Schema::dropIfExists('sis_compania');
    }
}
