<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('faq_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faq_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->text('body');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
            $table->foreign('faq_id')->references('id')->on('faq')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('faq');
        Schema::drop('faq_translations');
    }
}
