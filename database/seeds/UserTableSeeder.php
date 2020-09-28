<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
    	$user = new User;
    	$user->name = 'Admin';
    	$user->email = 'admin@gmail.com';
    	$user->password = Hash::make('123456789');
    	$user->assignRole('Admin');
    	$user->save();
    	
    	//quiz maker
    	$user = new User;
    	$user->name = 'Quizmaker';
    	$user->email = 'quizmaker@gmail.com';
    	$user->password = Hash::make('maker@quiz');
    	$user->assignRole('QuizMaker');
    	$user->save();

    	//participant
    	$user = new User;
    	$user->name = 'Participant';
    	$user->email = 'participant@gmail.com';
    	$user->password = Hash::make('participant@quiz');
    	$user->assignRole('Participant');
    	$user->save();
    }
}
