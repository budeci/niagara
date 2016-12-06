<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('image', 255);
            $table->boolean('active')->default(1)->index();
            //$table->timestamps();
        });
        Schema::create('program_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('program_id');
            $table->unsignedInteger('language_id');
             $table->string('slug', 225)->unique();

            $table->string('title', 255);
            $table->text('body');

            $table->unique(['program_id', 'language_id']);

           /* $table->foreign('program_id')->references('id')->on('program')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('program');
        Schema::drop('program_translations');
    }
}
