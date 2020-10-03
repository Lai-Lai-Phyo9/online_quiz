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
             ->select('topics.*','questions.questiontype','questions.id')
             ->get();
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
        if ($row->qtype="truefalse") {
            // this is truefalse
            $mark =($row->answerid==$row->userinput)?1:0;
            $user->truefalsequestions()->attach($row->qid,['answer'=>$row->userinput,'mark'=>$mark]);
        }
        if ($row->qtype="multichoice") {
            // this is mutlichoice
            $mark =($row->answerid==$row->userinput)?1:0;
            $user->multiquestions()->attach($row->qid,['answer'=>$row->userinput,'mark'=>$mark]);
         
        }
    }
  }
  public function show(){
      $user = User::find(Auth::id());
      // dd(getType($user->updated_at));
      $count=0;
      // $d=0;
      // dd($user->multiquestions);
      foreach($user->multiquestions as $row){
          $date = $row->pivot->created_at->format('Y/m/d');
          $time[$count++] = $row->pivot->created_at;
      }
      // dd($time);
      // dd($date);
      $dateList  = collect($date)->unique();
      $timeList  = collect($time);
      // dd($timeList);
      // dd($dateList);
      // foreach ($dateList as $row) {
      
      //       foreach ($user->multiquestions as $value) {
      //             if($row == $value->pivot->created_at->format('m/d/Y')){
      //               dd('haha');
      //             }else{
      //               dd($date);
      //             }
      //       }

      // }
      return view('frontend.show',compact('user','dateList','timeList'));
  }
}
