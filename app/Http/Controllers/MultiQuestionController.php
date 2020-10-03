<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\MultiQuestion;
class MultiQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multi_questions=MultiQuestion::all();
        return view ('backend.multiquestions.index',compact('multi_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions=Question::all();
        // dd($questions);
        // $multi_questions =MultiQuestion::all();
        return view('backend.multiquestions.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'choice1' => 'required',
            'choice2' => 'required',
            'choice3' => 'required',
            'choice4' => 'required',
            'answer' => 'required',
            'question' => 'required',

        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/multiimg'),$imageName);
        $myfile='backendtemplate/multiimg/'.$imageName;

        //Store Data
        $multiquestion = new MultiQuestion;
        $multiquestion->name = $request->name;
        $multiquestion->photo=$myfile;
        $multiquestion->choice1 = $request->choice1;
        $multiquestion->choice2 = $request->choice2;
        $multiquestion->choice3 = $request->choice3;
        $multiquestion->choice4 = $request->choice4;
        $multiquestion->answer = $request->answer;
        $multiquestion->question_id = $request->question;
        $multiquestion->save();

        // redirect
        return redirect()->route('multiquestions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::find($id);//obj
        $multiquestion=MultiQuestion::find($id);//obj
        // dd($topic);
        return view('backend.multiquestions.show',compact('multiquestion','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $questions =Question::all();
        $multiquestion=MultiQuestion::find($id);
        // dd($subcategory);
        return view ('backend.multiquestions.edit',compact('multiquestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update Data
        $multiquestion=MultiQuestion::find($id);
        $multiquestion->name=$request->name;
        $multiquestion->photo=$myfile;
        $multiquestion->choice1 = $request->choice1;
        $multiquestion->choice2 = $request->choice2;
        $multiquestion->choice3 = $request->choice3;
        $multiquestion->choice4 = $request->choice4;
        $multiquestion->answer = $request->answer;
        $multiquestion->question_id = $request->question;
        $multiquestion->save();

        //Redirect
        return redirect()->route('multiquestions.index'); 

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $multiquestion=MultiQuestion::find($id);
        //delete related file from storage
        $multiquestion->delete();
        return redirect()->route('multiquestions.index');
    }
}
