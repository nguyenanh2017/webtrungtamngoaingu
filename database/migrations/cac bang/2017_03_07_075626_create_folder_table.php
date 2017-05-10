<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->integer('id_fd')->unique();
            // khong co khoa chinh nho them AI vao truong them khi tao bang de dc tu tang


            $table->string('name_fd',35);
            $table->integer('id_parent');
            $table->integer('user_create_fd')->index();
            $table->foreign('user_create_fd')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('share_f');
            $table->string('fd_l',10)->index();
            $table->foreign('fd_l')->references('code_l')->on('languages')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('folders');
    }
}
