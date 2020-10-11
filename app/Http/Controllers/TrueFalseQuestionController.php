<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\TrueFalseQuestion;
class TrueFalseQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truefalsequestions=TrueFalseQuestion::all();
        return view ('backend.truefalsequestions.index',compact('truefalsequestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions=Question::all();
        return view('backend.truefalsequestions.create',compact('questions'));
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
            'answer' => 'required',
            'question' => 'required',

        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/truefalseimg'),$imageName);
        $myfile='backendtemplate/truefalseimg/'.$imageName;

        //Store Data
        $truefalsequestion = new TrueFalseQuestion;
        $truefalsequestion->name = $request->name;
        $truefalsequestion->photo=$myfile;
        $truefalsequestion->answer = $request->answer;
        $truefalsequestion->question_id = $request->question;
        $truefalsequestion->save();

        // redirect
        return redirect()->route('truefalsequestions.index');
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
      $truefalsequestion=TrueFalseQuestion::find($id);//obj
      // dd($topic);
      return view('backend.truefalsequestions.show',compact('truefalsequestion','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions =Question::all();
        $truefalsequestion=TrueFalseQuestion::find($id);
        // dd($subcategory);
        return view ('backend.truefalsequestions.edit',compact('truefalsequestion','questions'));
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
        //if upload new image, delete old image
        $myfile=$request->old_photo;
        if($request->hasfile('photo'))
        {
            $imageName=time().'.'.$request->photo->extension();
            $name=$request->old_photo;

            if(file_exists(public_path($name))){
                unlink(public_path($name));
                $request->photo->move(public_path('backendtemplate/truefalseimg'),$imageName);
                $myfile='backendtemplate/truefalseimg/'.$imageName;
            }
        }
        //Update Data
        $truefalsequestion=TrueFalseQuestion::find($id);
        $truefalsequestion->name=$request->name;
        $truefalsequestion->photo=$myfile;
        $truefalsequestion->answer = $request->answer;
        $truefalsequestion->question_id = $request->question;
        $truefalsequestion->save();

        //Redirect
        return redirect()->route('truefalsequestions.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truefalsequestion=TrueFalseQuestion::find($id);
        //delete related file from storage
        $truefalsequestion->delete();
        return redirect()->route('truefalsequestions.index');
    }
}
