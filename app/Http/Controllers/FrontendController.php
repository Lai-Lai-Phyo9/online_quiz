<?php

namespace App\Http\Controllers;
use App\Topic;
use App\Subject;
use App\Question;
use App\MultiQuestion;
use App\TrueFalseQuestion;
use App\ShortQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
class FrontendController extends Controller
{
    // public function _construct($value='')
    // {
    //     $this->middleware('auth')->only('getAnswers');
    // }
		public function home()
		{
      $data = DB::table('questions')
               ->join('topics','topics.id','=','questions.topic_id')
               ->select('topics.*','questions.questiontype','questions.id')
               ->get();
			return view('frontend.home',compact('data'));
		}
    //Tshow
    public function detail($id)
    {


       $user = Auth::user();
       $userId = Auth::id();

       $question=Question::find($id);
       $questiontype = $question->questiontype;
       // dd($questiontype);
       if($questiontype=="truefalse"){

          $detail = TrueFalseQuestion::where('question_id',$id)->get();
          // dd($detail);
       }else if($questiontype=="short"){

          $detail = ShortQuestion::where('question_id',$id)->get();
          // dd($detail);
       }
       else if($questiontype=="multichoice"){
          $detail = MultiQuestion::where('question_id',$id)->get();
          // dd($detail);
       }
       return view('frontend.detail',compact('detail','questiontype','userId'));
    }

    public function storeanswer(Request $request)
    {
         // $data = $request->all();
        // $arr = json_decode($request->data);
        $carts = json_decode($request->data);
        dd($carts);

    }

}
