<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_company', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('logo')->nullable();
            $table->string('run')->nullable();
            $table->string('name_owner')->nullable();
            $table->string('name_company')->nullable();
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('city_id')->references('id')->on('sys_cities');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('web_site')->nullable();
            $table->json('settings')->nullable();
            $table->json('integrations')->nullable();
            $table->string('color_company')->nullable();
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
        Schema::dropIfExists('sys_company');
    }
}
