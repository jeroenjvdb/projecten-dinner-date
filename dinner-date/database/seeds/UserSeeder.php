<?php 

use Illuminate\Database\Seeder;


use App\User;
use App\FoodProfile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User;

        $user1->name = "Van den Broeck";
        $user1->surname = "jeroen";
        $user1->email = "jeroen@test.be";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1991-02-02";
        

        $user1->save();
        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->save();

        $admin = new User;

        $admin->name = "admin";
        $admin->surname = "mister";
        $admin->email = "email@root.be";
        $admin->password = Hash::make('root');
        $admin->dateOfBirth = "1991-02-02";

        $admin->save();
        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $admin->id;
        $foodprofile->save();

        //////////////////////

        $user1 = new User;

        $user1->name = "Van Reeth";
        $user1->surname = "Jonas";
        $user1->email = "jonasvanreeth@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1991-02-02";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "Joyful person";
        $user1->favoriteDish = "Macaron with ham and cheese";
        $user1->favRestaurant = "Rossario";
        $user1->sex = 0;
        $user1->perfectDate = "Dinner at candlelight under the nightsky full with stars";
        $user1->searchFor = 1;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();

        ////////////////////////

        $user1 = new User;

        $user1->name = "de Ridder";
        $user1->surname = "Marie";
        $user1->email = "mariederidder@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1990-05-12";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "Joyful person";
        $user1->favoriteDish = "Macaron with ham and cheese";
        $user1->favRestaurant = "Rossario";
        $user1->sex = 1;
        $user1->perfectDate = "Dinner at candlelight under the nightsky full with stars";
        $user1->searchFor = 0;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();


        ////////////////////////

        $user1 = new User;

        $user1->name = "De Vocht";
        $user1->surname = "Sofie";
        $user1->email = "sofiedevocht@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1993-04-04";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "Joyful person who loves to eat";
        $user1->favoriteDish = "Macaron with ham and cheese";
        $user1->favRestaurant = "giovanni";
        $user1->sex = 1;
        $user1->perfectDate = "Dinner at candlelight under the nightsky full with stars";
        $user1->searchFor = 0;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();

        ////////////////////////

        $user1 = new User;

        $user1->name = "De Koninck";
        $user1->surname = "Karel";
        $user1->email = "kareldekonick@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1990-04-04";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "Joyful person who loves to eat";
        $user1->favoriteDish = "Macaron with ham and cheese";
        $user1->favRestaurant = "giovanni";
        $user1->sex = 0;
        $user1->perfectDate = "Dinner at candlelight under the nightsky full with stars";
        $user1->searchFor = 1;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();

        ////////////////////////

        $user1 = new User;

        $user1->name = "De backer";
        $user1->surname = "Uma";
        $user1->email = "umadebacker@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1990-04-04";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "Student nursery, in search for a date";
        $user1->favoriteDish = "lasanga";
        $user1->favRestaurant = "giovanni";
        $user1->sex = 1;
        $user1->perfectDate = "Pinick in the park";
        $user1->searchFor = 0;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();

        ////////////////////////

        $user1 = new User;

        $user1->name = "Coppens";
        $user1->surname = "Joris";
        $user1->email = "joriscoppens@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1994-08-08";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "law student, in search for a date";
        $user1->favoriteDish = "Pizza Hawai";
        $user1->favRestaurant = "giovanni";
        $user1->sex = 0;
        $user1->perfectDate = "Pinick in the park";
        $user1->searchFor = 1;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();

        ////////////////////////

        $user1 = new User;

        $user1->name = "Van Acker";
        $user1->surname = "Smitha";
        $user1->email = "smithava@gmail.com";
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1991-08-08";
        $user1->country = "Belgium";
        $user1->city = "Antwerp";
        $user1->about = "law student, in search for some company";
        $user1->favoriteDish = "Pizza Hawai";
        $user1->favRestaurant = "giovanni";
        $user1->sex = 1;
        $user1->perfectDate = "Pinick in the park";
        $user1->searchFor = 0;

        $user1->save();

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user1->id;
        $foodprofile->salt = rand(0,1);
        $foodprofile->sweet = rand(0,1);
        $foodprofile->bitter = rand(0,1);
        $foodprofile->sour = rand(0,1);
        $foodprofile->umami = rand(0,1);
        $foodprofile->spicy = rand(0,1);
        $foodprofile->chinese = rand(0,1);
        $foodprofile->japanese = rand(0,1);
        $foodprofile->french  = rand(0,1);
        $foodprofile->greek = rand(0,1);
        $foodprofile->italian = rand(0,1);
        $foodprofile->cow_milk = rand(0,1);
        $foodprofile->eggs = rand(0,1);
        $foodprofile->fish = rand(0,1);
        $foodprofile->shellfish = rand(0,1);
        $foodprofile->peanuts = rand(0,1);
        $foodprofile->treenuts = rand(0,1);
        $foodprofile->wheats = rand(0,1);
        $foodprofile->soy = rand(0,1);
        $foodprofile->save();
    }
}
