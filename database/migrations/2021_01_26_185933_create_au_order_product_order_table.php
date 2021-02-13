<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuOrderProductOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('au_order_product_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('in_products');
            $table->foreignId('user_id')->references('id')->on('sys_users');
            $table->datetime('current_date');
            $table->integer('old_quantity');
            $table->integer('new_quantity');
            $table->integer('total_quantity');
            $table->double('current_price')->default(0);
            $table->double('import_price')->default(0);
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
        Schema::dropIfExists('au_order_product_order');
    }
}
