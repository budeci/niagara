<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('image', 255);
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('opportunities_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('opportunity_id');
            $table->unsignedInteger('language_id');
            $table->string('name', 255);
            $table->text('body');
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('opportunities');
        Schema::drop('opportunities_translations');
    }
}