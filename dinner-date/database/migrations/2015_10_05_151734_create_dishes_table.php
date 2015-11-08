<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->mediumText('sDescription');
            $table->longText('lDescription');

            //$table->...('duur');
            $table->integer('difficulty');
            $table->longText('ingredients');
            $table->longText('preparations');
            $table->string('fittingDrinks');

            //foreign keys
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('dishes');
    }
}
