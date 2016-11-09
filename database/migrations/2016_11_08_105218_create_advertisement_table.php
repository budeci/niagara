<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('view_count')->unsigned();
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('advertisement_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advertisement_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('opportunities');
            $table->text('inside_club');
            $table->text('sponsors');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
            $table->foreign('advertisement_id')->references('id')->on('advertisement')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('advertisement');
        Schema::drop('advertisement_translations');
    }
}
