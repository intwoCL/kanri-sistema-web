<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiInvoiceBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bi_invoice_bill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('sys_company');
            $table->foreignId('client_id')->references('id')->on('sys_clients');
            $table->foreignId('product_id')->references('id')->on('in_products');
            $table->foreignId('user_id')->references('id')->on('sys_users');
            $table->datetime('issue_date');
            $table->integer('quantity');
            $table->double('price');
            $table->double('subtotal');
            $table->double('total');
            $table->float('discount')->default(0);
            $table->float('iva')->default(0);
            $table->integer('status');
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
        Schema::dropIfExists('bi_invoice_bill');
    }
}
