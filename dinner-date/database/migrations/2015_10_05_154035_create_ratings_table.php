<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');

            //foreign keys
            $table->integer('rater_id')->unsigned();
            $table->foreign('rater_id')->references('id')->on('users'); 
            $table->integer('dish_id')->unsigned();
            $table->foreign('dish_id')->references('id')->on('dishes');

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
        Schema::drop('ratings');
    }
}
