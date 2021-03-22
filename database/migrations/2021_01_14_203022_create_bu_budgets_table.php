<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bu_budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('sys_users');
            $table->integer('client_id')->nullable();
            $table->datetime('start_date');
            $table->datetime('finish_date');
            $table->string('glosa');
            $table->double('subtotal')->default(0);
            $table->float('iva')->default(0);
            $table->double('total')->default(0);
            $table->integer('status');
            $table->integer('count_email');
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
        Schema::dropIfExists('bu_budgets');
    }
}
