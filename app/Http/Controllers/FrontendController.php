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
use Illuminate\Support\Arr;
use DB;
use App\User;
class FrontendController extends Controller
{
   //show topics in homeblade 
	public function home(){
      $data = DB::table('questions')
          ->join('topics','topics.id','=','questions.topic_id')
          ->join('levels','topics.level_id','=','levels.id')
          ->select('topics.*','questions.questiontype','questions.id','levels.name as levelname')
          ->get();
          // dd($data);
      return view('frontend.home',compact('data'));
	}
   //show question detail
   public function detail($id){
      //get login user id
      $user = Auth::user();
      $userId = Auth::id();
      $question=Question::find($id);
      $questiontype = $question->questiontype;
      // dd($questiontype);
      if($questiontype=="truefalse")
      {
         $detail = TrueFalseQuestion::where('question_id',$id)->get();
         // dd($detail);
      }else if($questiontype=="short")
      {
         $detail = ShortQuestion::where('question_id',$id)->get();
         // dd($detail);
      }
      else if($questiontype=="multichoice")
      {
         $detail = MultiQuestion::where('question_id',$id)->get();
         // dd($detail);
      }
      $count =0;
      foreach ($detail as $detail1)
      {
         $arr[$count]=$detail1->id;
         $count++;
      }
      // dd($arr);
      $random = Arr::random($arr, 3);
      // dd($random);
      return view('frontend.detail',compact('detail','questiontype','userId','random'));
   }
   //ajax
   public function storeanswer(Request $request){
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
   //show recent marks for user
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
        $datas = DB::table('multi_user')
                 ->join('multi_questions','multi_questions.id','=','multi_user.multi_question_id')
                 ->join('questions','questions.id','=','multi_questions.question_id')
                 ->join('topics','topics.id','=','questions.topic_id')
                 ->select('topics.name','multi_user.created_at as multitime')
                 ->get();
        $tfdatas = DB::table('true_user')
                 ->join('true_false_questions','true_false_questions.id','=','true_user.true_false_question_id')
                 ->join('questions','questions.id','=','true_false_questions.question_id')
                 ->join('topics','topics.id','=','questions.topic_id')
                 ->select('topics.name','true_user.created_at as truetime')
                 ->get();
        // dd($tfdatas);
      return view('frontend.show',compact('users','tfusers','datas','tfdatas'));
   }
}
