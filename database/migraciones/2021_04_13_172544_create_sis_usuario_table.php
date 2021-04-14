<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('correo',150)->unique();
            $table->string('password',64);
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->foreignId('id_rol')->references('id')->on('sys_rol');
            $table->json('token_cuenta')->nullable;
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('sis_usuario');
    }
}
