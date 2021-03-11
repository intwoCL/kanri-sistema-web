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
            $table->integer('client_id')->nullable();
            $table->foreignId('user_id')->references('id')->on('sys_users');
            $table->datetime('issue_date');
            $table->integer('quantity')->default(0);
            $table->double('price')->default(0);
            $table->double('subtotal')->default(0);
            $table->double('total')->default(0);
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
