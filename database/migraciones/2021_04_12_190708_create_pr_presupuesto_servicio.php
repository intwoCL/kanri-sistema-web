<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrPresupuestoServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_presupuesto_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_presupuesto')->references('id')->on('pr_presupuesto');
            $table->string('nombre_servicio');
            $table->double('valor_unico')->default(0);
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
        Schema::dropIfExists('pr_presupuesto_servicio');
    }
}
