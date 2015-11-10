<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function($table) {
            $table->increments('id');

            $table->string('message');

            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users');

            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id')->on('users');

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
        Schema::drop('chat');
    }
}
