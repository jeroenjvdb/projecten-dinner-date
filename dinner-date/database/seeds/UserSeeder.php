<?php 

use Illuminate\Database\Seeder;


use App\User;

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
        $user1->password = Hash::make('test');

        $user1->save();

        $admin = new User;

        $admin->name = "admin";
        $admin->surname = "mister";
        $admin->email = "email@root.be";
        $admin->password = Hash::make('root');

        $admin->save();
    }
}
