<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('desc');
            $table->double('price', 16, 7);
            $table->integer('is_new')->default(1);
            $table->string('photo')->default('default_ad_photo.jpg');
            $table->string('city');
            $table->string('owner_name');
            $table->string('mobile');
            $table->string('email');
            $table->integer('approved')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('main_category_id')->unsigned();
            $table->integer('sub_category_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('main_category_id')->references('id')->on('main_categories');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
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
        Schema::drop('advertisements');
    }
}
