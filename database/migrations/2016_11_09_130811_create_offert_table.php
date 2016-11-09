<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offert', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('view_count')->unsigned();
            $table->string('image',255);
            $table->timestamp('public_date');
            $table->timestamp('expire_date');
            $table->boolean('active')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('offert_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offert_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('body');
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->string('meta_keyword', 255);
            $table->foreign('offert_id')->references('id')->on('offert')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('offert');
        Schema::drop('offert_translations');
    }
}
