<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuProductBudgetDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bu_product_budget_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->references('id')->on('bu_budgets');
            $table->foreignId('product_id')->references('id')->on('in_products');
            $table->integer('unit_value');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('product_name');
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
        Schema::dropIfExists('bu_product_budget_detail');
    }
}
