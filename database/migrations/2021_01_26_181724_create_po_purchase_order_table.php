<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoPurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_purchase_order', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->foreignId('provider_id')->references('id')->on('sys_provider');
            $table->foreignId('user_id')->references('id')->on('sys_users');
            $table->datetime('issue_date');
            $table->datetime('delivery_date')->nullable();
            $table->string('comment')->nullable();
            $table->float('discount')->default(0);
            $table->float('iva')->default(0);
            $table->double('subtotal')->default(0);
            $table->double('total')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('po_purchase_order');
    }
}
