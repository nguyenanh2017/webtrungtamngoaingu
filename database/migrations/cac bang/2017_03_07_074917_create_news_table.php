<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_news',200);
            $table->text('header');
            $table->text('content');
            $table->integer('public');

            $table->string('name_post')->index();
            $table->foreign('name_post')->references('email')->on('users');

            $table->string('code_news',10)->index();
            $table->foreign('code_news')->references('code_newsgroup')->on('newsgroups');
           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
