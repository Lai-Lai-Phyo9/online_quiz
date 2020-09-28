<?php

namespace App\Http\Controllers;
use App\Topic;
use App\Subject;
use App\Question;
use App\MultiQuestion;
use App\TrueFalseQuestion;
use App\ShortQuestion;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    public function index()
    {
       return view('frontend.login');
    }
		public function home()
		{
         $data = DB::table('questions')
               ->join('topics','topics.id','=','questions.topic_id')
               ->select('topics.*','questions.questiontype','questions.id')
               ->get();
			return view('frontend.home',compact('data'));
		}
    //TopicController -show
    public function detail($id)
    {
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
       return view('frontend.detail',compact('detail','questiontype'));
       // dd($question);
       // $tfdata=DB::table('true_false_questions')->whereIn('question_id',$question)->get();
       //  $multidata=DB::table('multi_questions')->whereIn('question_id',$question)->get();
       //   $shortdata=DB::table('short_questions')->whereIn('question_id',$question)->get();
       // return view('frontend.detail',compact('tfdata','multidata','shortdata'));
    }
    //MultiQuestionController show
    // public function show()
    // {
    //    $multiquestions = MultiQuestion::orderBy('name', 'desc')
    //             ->take(3)
    //             ->get();
    //    return view('frontend.show',compact('multiquestions'));
    // }
}
