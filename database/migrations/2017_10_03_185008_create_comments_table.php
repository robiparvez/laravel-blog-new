<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('email');
            $table->text('comment')->nullable();
            $table->boolean('approved')->nullable()->default(false);
            $table->integer('post_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); // don't need to use detach method

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
