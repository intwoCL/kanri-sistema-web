<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuServiceBudgetDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bu_service_budget_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->references('id')->on('bu_budgets');
            $table->string('name_service');
            $table->double('unique_value')->default(0);
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
        Schema::dropIfExists('bu_service_budget_detail');
    }
}
