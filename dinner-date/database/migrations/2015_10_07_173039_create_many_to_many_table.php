<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManyToManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_allergies', function($table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('allergy_id')->unsigned();
            $table->foreign('allergy_id')->references('id')->on('allergies');
        
        });

        Schema::create('users_tastes', function($table){
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('taste_id')->unsigned();
            $table->foreign('taste_id')->references('id')->on('tastes');
        });

        Schema::create('users_dates', function($table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')->references('id')->on('dates');        
        });

        Schema::create('users_desserts', function($table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('dessert_id')->unsigned();
            $table->foreign('dessert_id')->references('id')->on('desserts');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_allergies');
        Schema::drop('users_tastes');
        Schema::drop('users_dates');
        Schema::drop('users_desserts');
    }
}
