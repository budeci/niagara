<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('team', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('slug', 225)->unique();
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('team_translations', function(Blueprint $table)
        {
            $table->increments('id');

            $table->unsignedInteger('team_id');
            $table->unsignedInteger('language_id');

            $table->string('name', 255);
            $table->string('job', 255);
            $table->string('image', 255);
            $table->text('body');

            $table->unique(['team_id', 'language_id']);

            $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('team');
        Schema::drop('team_translations');
    }
}