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
        $user->image='img1';
    	$user->assignRole('admin');
    	$user->save();
    	
    	//quiz maker
    	$user = new User;
    	$user->name = 'Quizmaker';
    	$user->email = 'quizmaker@gmail.com';
    	$user->password = Hash::make('password');
        $user->image='img2';
        $user->university_school = 'KTU';
        $user->work_organization = 'Work';
    	$user->assignRole('quiz maker');
    	$user->save();

    	//participant
    	$user = new User;
    	$user->name = 'Participant';
    	$user->email = 'participant@gmail.com';
    	$user->password = Hash::make('password');
        $user->image='img3';
        $user->university_school = 'CU';
        $user->work_organization = 'Work';
    	$user->assignRole('participant');
    	$user->save();
    }
}
