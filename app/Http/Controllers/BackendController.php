<?php

namespace App\Http\Controllers;
use App\User;
use App\Topic;
use App\Question;
use App\MultiQuestion;
use App\TrueFalseQuestion;
use Illuminate\Http\Request;
use DB;
class BackendController extends Controller
{
    public function dashboard()
    {	
    	$parti =0;
    	$quizm=0;
    	$topics=Topic::all();
        $users=User::all();
        $questions=Question::all();
        // $multiquestions=MultiQuestion::all();
        // $truefalsequestions=TrueFalseQuestion::all();

        //count for quiz maker and participant
        $data = DB::table('model_has_roles as model')
             ->join('users','users.id','=','model.model_id')
             ->join('roles','roles.id','=','model.role_id')
             ->select('model.*')
             ->get();
             
        foreach ($data as $haha) {
            if($haha->role_id == 9){
                $parti++;
            }
            if ($haha->role_id == 8) {
                $quizm++;
            }
        }
        // dd($quizm);
    	return view('backend.dashboard',compact('users','parti','quizm','topics','questions'));
    }
}
