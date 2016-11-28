<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::create('calc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_calc_id')->unsigned();
            $table->string('image', 255);
            $table->integer('view_count')->unsigned();
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('calc_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calc_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('body');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
           /* $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');*/
        });

        Schema::create('categories_calc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255);
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });
        Schema::create('categories_calc_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calc_id')->unsigned();
            $table->integer('category_calc_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
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
        Schema::drop('calc');
        Schema::drop('calc_translations');
        Schema::drop('categories_calc');
        Schema::drop('categories_calc_translations');
    }
}
