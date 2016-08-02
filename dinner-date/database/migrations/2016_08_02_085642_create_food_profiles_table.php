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
            $table->boolean('salt')->default(0);
            $table->boolean('sweet')->default(0);
            $table->boolean('bitter')->default(0);
            $table->boolean('sour')->default(0);
            $table->boolean('umami')->default(0);
            $table->boolean('spicy')->default(0);
            //kitchen style
            $table->boolean('chinese')->default(0);
            $table->boolean('japanese')->default(0);
            $table->boolean('french')->default(0);
            $table->boolean('greek')->default(0);
            $table->boolean('italian')->default(0);
            //allergies
            $table->boolean("cow_milk")->default(0);
            $table->boolean('eggs')->default(0);
            $table->boolean('fish')->default(0);
            $table->boolean('shellfish')->default(0);
            $table->boolean('peanuts')->default(0);
            $table->boolean('treenuts')->default(0);
            $table->boolean('wheats')->default(0);
            $table->boolean('soy')->default(0);

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
