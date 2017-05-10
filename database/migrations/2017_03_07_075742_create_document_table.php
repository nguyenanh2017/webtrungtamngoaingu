<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_d',10,null);
            $table->string('name_d',30);
            $table->string('comment',100);
            $table->string('url_d',100);
            $table->integer('user_create_d');
            $table->foreign('user_create_d')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('share_d');

            $table->integer('in_fd')->index();
            $table->foreign('in_fd')->references('id_fd')->on('folders')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('documents');
    }
}
