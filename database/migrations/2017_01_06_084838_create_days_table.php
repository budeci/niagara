<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('days_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('day_id');
            $table->unsignedInteger('language_id');

            $table->string('name', 255);
            $table->unique(['day_id', 'language_id']);

            $table->foreign('day_id')->references('id')->on('day')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('days');
        Schema::drop('days_translations');
    }
}
