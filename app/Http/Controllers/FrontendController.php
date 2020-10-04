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
	public function home()
	{
    $data = DB::table('questions')
             ->join('topics','topics.id','=','questions.topic_id')
             ->join('levels','topics.level_id','=','levels.id')
             ->select('topics.*','questions.questiontype','questions.id','levels.name as levelname')
             ->get();
             // dd($data);
		return view('frontend.home',compact('data'));
	}
  //show question detail
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
    $carts = json_decode($request->data);
    // dd($carts);
    $user = User::find(Auth::id());
    foreach ($carts as $row) {
        // dd($row);
        if ($row->qtype=="truefalse") {
            // this is truefalse
            $mark =($row->answerid==$row->userinput)?1:0;
            $user->truefalsequestions()->attach($row->qid,['answer'=>$row->userinput,'mark'=>$mark]);
        }
        else if ($row->qtype=="multichoice") {
            // this is mutlichoice
            $mark =($row->answerid==$row->userinput)?1:0;
            $user->multiquestions()->attach($row->qid,['answer'=>$row->userinput,'mark'=>$mark]);
         
        }
    }
  }
  public function show(){
        $users = DB::table('multi_user')
                     ->select(DB::raw('sum(mark) as mark,count(mark) as count,created_at'))
                     ->where('user_id', '=', Auth::id())
                     ->groupBy('created_at')
                     ->get(); 
         $tfusers = DB::table('true_user')
                     ->select(DB::raw('sum(mark) as mark,count(mark) as count,created_at'))
                     ->where('user_id', '=', Auth::id())
                     ->groupBy('created_at')
                     ->get();    
   

        // dd($users);
      return view('frontend.show',compact('users','tfusers'));
  }
}
