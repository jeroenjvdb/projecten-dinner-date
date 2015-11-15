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
        $user1->password = Hash::make('test1234');
        $user1->dateOfBirth = "1991-02-02";
        

        $user1->save();

        $admin = new User;

        $admin->name = "admin";
        $admin->surname = "mister";
        $admin->email = "email@root.be";
        $admin->password = Hash::make('root');
        $admin->dateOfBirth = "1991-02-02";

        $admin->save();

        $user1 = new User;

        $user1->name = "Van Reeth";
        $user1->surname = "Jonas";
        $user1->email = "jonasvanreeth@gmail.com";
        $user1->password = Hash::make('test1234');
        $admin->dateOfBirth = "1991-02-02";

        $user1->save();
    }
}
