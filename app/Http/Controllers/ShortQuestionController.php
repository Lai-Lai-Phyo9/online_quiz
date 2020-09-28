<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\ShortQuestion;
class ShortQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortquestions=ShortQuestion::all();
        return view ('backend.shortquestions.index',compact('shortquestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions=Question::all();
        return view('backend.shortquestions.create',compact('questions'));
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
            'question' => 'required',

        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/shortimg'),$imageName);
        $myfile='backendtemplate/shortimg/'.$imageName;

        //Store Data
        $shortquestion = new ShortQuestion;
        $shortquestion->name = $request->name;
        $shortquestion->photo=$myfile;
        $shortquestion->question_id = $request->question;        
        $shortquestion->save();

        // redirect
        return redirect()->route('shortquestions.index');
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
        $shortquestion=ShortQuestion::find($id);//obj
        // dd($topic);
        return view('backend.shortquestions.show',compact('shortquestion','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shortquestion=ShortQuestion::find($id);
        //delete related file from storage
        $shortquestion->delete();
        return redirect()->route('shortquestions.index');
    }
}
