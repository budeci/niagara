<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeautyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beauty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image',255);
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('beauty_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beauty_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->string('annotation',255);
            $table->text('body');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
            $table->foreign('beauty_id')->references('id')->on('beauty')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('beauty');
        SChema::drop('beauty_translations');
    }
}
