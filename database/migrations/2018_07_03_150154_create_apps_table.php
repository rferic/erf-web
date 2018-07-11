<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('version');
            $table->string('vue_component');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('id');
        });

        Schema::create('app_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('app_id');
            $table->string('src');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('priority');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('app_id')->references('id')->on('apps');
        });

        Schema::create('app_user', function (Blueprint $table) {
            $table->unsignedInteger('app_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('app_id')->references('id')->on('apps');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_user');
        Schema::dropIfExists('app_images');
        Schema::dropIfExists('apps');
    }
}
