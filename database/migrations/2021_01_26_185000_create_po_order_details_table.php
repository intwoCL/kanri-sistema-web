<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('in_products');
            $table->foreignId('product_provider_id')->references('id')->on('in_products_supplier_detail');
            $table->foreignId('purchase_id')->references('id')->on('po_purchase_order');
            $table->integer('quantity');
            $table->integer('amount_received');
            $table->double('price')->default(0);
            $table->double('total')->default(0);
            $table->boolean('check')->default(false);
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
        Schema::dropIfExists('po_order_details');
    }
}
