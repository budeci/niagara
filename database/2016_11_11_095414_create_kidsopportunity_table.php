<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidsopportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_antrenament', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image1',255);
            $table->string('image2',255);
            $table->string('image3',255);
            $table->integer('opportunities');
            $table->integer('view_count')->unsigned();
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('opportunity_antrenament_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_antrenament_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->string('annotation1',255);
            $table->string('annotation2',255);
            $table->string('annotation3',255);
            $table->text('body');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
            $table->foreign('opportunity_antrenament_id')->references('id')->on('opportunity_antrenament')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('opportunity_antrenament');
        SChema::drop('opportunity_antrenament_translations');
    }
}
