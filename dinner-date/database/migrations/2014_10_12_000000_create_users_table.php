<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->date('dateOfBirth');
            $table->string('country');
            $table->string('city');
            $table->string('streetname');
            $table->string('housenumber');
            $table->string('specialAllergies');
            $table->string('favoriteDish');
            $table->integer('spicyness');
            $table->boolean('complete')->default(0);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('sex')->default(0);
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
        Schema::drop('users');
    }
}
