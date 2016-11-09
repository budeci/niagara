<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('view_count')->unsigned();
            $table->string('category_slug',255);
            $table->text('link');
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('press_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('press_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('body');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
            $table->foreign('press_id')->references('id')->on('press')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('press');
        Schema::drop('press_translations');
    }
}
