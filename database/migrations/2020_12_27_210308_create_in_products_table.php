<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->double('import_price')->default(0);
            $table->double('credit_price')->default(0);
            $table->foreignId('category_id')->references('id')->on('in_categories');
            $table->foreignId('product_type_id')->references('id')->on('in_product_type');
            $table->foreignId('units_id')->references('id')->on('in_units');
            $table->integer('available_stock');
            $table->integer('critical_stock');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('in_products');
    }
}
