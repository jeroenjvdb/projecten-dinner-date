<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('area');
            $table->string('name_dish');
            $table->string('description');
            $table->integer('preference');
            $table->integer('typeOfDate');
           
            //foreign keys
            $table->integer('host_id')->unsigned();
            $table->integer('dish_id')->unsigned();

//            $table->foreign('host_id')->references('id')->on('users');

            $table->rememberToken();
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
        Schema::drop('dates');
    }
}
