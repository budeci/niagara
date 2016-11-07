<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('slug', 225)->unique();
            $table->string('image', 255);
            $table->string('link', 255);
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('partner_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('partner_id');
            $table->unsignedInteger('language_id');
            $table->string('name', 255);
            $table->string('sale', 255);
            $table->text('body');

            $table->unique(['partner_id', 'language_id']);

            $table->foreign('partner_id')->references('id')->on('partner')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('partner');
        Schema::drop('partner_translations');
    }
}