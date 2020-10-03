<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard()
    {	
    	// $parti =0;
    	// $quizm=0;
    	// $users=User::all();
    	// $haha = User::where('$user->id', '=', '$user->role_id') groupBy('$role->id') 
			  //   ->get();
			  //   dd($haha);
    	// foreach ($users as $user) {
    	// // dd($user->name);
     //    // dd($user->id);
     //    if($user->name== 'quiz maker')
     //    {
     //        $parti++;
     //    }
     //    else if($user->name=='participant')
     //    {
     //        $quizm++;
     //    }
     //    }
     //    dd($quizm);
    	// $users=User::all();
    	return view('backend.dashboard');
    }
}
