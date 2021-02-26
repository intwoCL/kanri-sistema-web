<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInProductsSupplierDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_products_supplier_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->references('id')->on('sys_provider');
            $table->foreignId('product_id')->references('id')->on('in_products');
            $table->integer('price');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('in_products_supplier_detail');
    }
}
