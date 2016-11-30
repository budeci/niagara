<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_membership_id')->unsigned();
            $table->string('image', 255);
            $table->integer('view_count')->unsigned();
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('membership_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membership_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->text('body');
           /* $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');*/
        });

        Schema::create('categories_membership', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255);
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });
        Schema::create('categories_membership_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membership_id')->unsigned();
            $table->integer('category_membership_id')->unsigned();
            $table->string('name', 255);
            $table->text('body');
            /*$table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_news_id')->references('id')->on('categories_news')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('membership');
        Schema::drop('membership_translations');
        Schema::drop('categories_membership');
        Schema::drop('categories_membership_translations');
    }
}