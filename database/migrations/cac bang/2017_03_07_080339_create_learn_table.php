<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student')->index();
            $table->foreign('student')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('learn_l',10)->index();
            $table->foreign('learn_l')->references('code_l')->on('languages');
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
        Schema::dropIfExists('learns');
    }
}
