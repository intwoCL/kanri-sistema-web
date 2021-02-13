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
            $table->string('run');
            $table->string('name_owner')->nullable();
            $table->string('name_company');
            $table->string('type');
            $table->string('address');
            $table->foreignId('city_id')->references('id')->on('sys_cities');
            $table->string('phone');
            $table->string('email');
            $table->string('web_site')->nullable();
            $table->json('settings');
            $table->json('integrations');
            $table->string('color_company');
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
