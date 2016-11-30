<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('active')->default(1)->index();
            $table->string('image', 255);
            $table->timestamps();
        });

        Schema::create('privilege_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('privilege_id');
            $table->unsignedInteger('language_id');
            $table->string('name', 255);
            $table->text('body');

            /*$table->unique(['result_calories_id', 'language_id']);*/

            /*$table->foreign('result_calories_id')->references('id')->on('result_calories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('privilege');
        Schema::drop('privilege_translations');
    }
}
