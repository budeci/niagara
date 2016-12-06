<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('active')->default(1)->index();
            $table->string('image', 255);
            $table->unsignedInteger('trainer_id');
            $table->dateTime('hour');
            $table->enum('choices', ['adult', 'kids'])->default('adult');
            $table->integer('day')->default(1);
            $table->timestamps();
        });

        Schema::create('schedule_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('language_id');
            $table->string('name', 255);
            $table->string('hall', 255);
            $table->text('body');

            /*$table->unique(['result_calories_id', 'language_id']);*/

            /*$table->foreign('result_calories_id')->references('id')->on('result_calories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');*/
        });
        Schema::create('schedule_program', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('program_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedule');
        Schema::drop('schedule_translations');
        Schema::drop('schedule_program');
    }
}
