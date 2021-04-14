<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrProductoPresupuesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_producto_presupuesto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_presupuesto')->references('id')->on('pr_presupuesto');
            $table->foreignId('id_producto')->references('id')->on('in_prodcuto');
            $table->double('valor_unidad')->default(0);
            $table->integer('cantidad');
            $table->double('total')->default(0);
            $table->string('nombre_producto');
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
        Schema::dropIfExists('pr_producto_presupuesto');
    }
}
