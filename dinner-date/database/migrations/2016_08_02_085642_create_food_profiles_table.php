<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('salt');
            $table->boolean('sweet');
            $table->boolean('bitter');
            $table->boolean('sour');
            $table->boolean('umami');
            $table->boolean('spicy');
            //kitchen style
            $table->boolean('chinese');
            $table->boolean('japanese');
            $table->boolean('french');
            $table->boolean('greek');
            $table->boolean('italian');
            //allergies
            $table->boolean("cow_milk");
            $table->boolean('eggs');
            $table->boolean('fish');
            $table->boolean('shellfish');
            $table->boolean('peanuts');
            $table->boolean('treenuts');
            $table->boolean('wheats');
            $table->boolean('soy');

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
        Schema::drop('food_profiles');
    }
}
