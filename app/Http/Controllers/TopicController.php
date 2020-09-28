<?php

namespace App\Http\Controllers;
use App\Topic;
use App\User;
use App\Subject;
use App\Level;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::all();
        return view ('backend.topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects=Subject::all();
        // dd($subjects);
        $users=User::all();
        // dd($users);
        $levels=Level::all();
        // dd($levels);
        $topics=Topic::all();
        // dd($topics);
        return view ('backend.topics.create', compact('subjects','users','levels','topics'));

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
            'user' => 'required',
            'subject' => 'required',
            'level' => 'required',
        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backendtemplate/topicimg'),$imageName);
        $myfile='backendtemplate/topicimg/'.$imageName;

        //Store Data
        $topic = new Topic;
        $topic->name = $request->name;
        $topic->photo=$myfile;
        $topic->user_id = $request->user;
        $topic->subject_id = $request->subject;
        $topic->level_id = $request->level;
        $topic->save();

        // redirect
        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic=Topic::find($id);//obj
        $user=User::find($id);//obj
        // dd($topic);
        return view('backend.topics.show',compact('topic','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics =Topic::all();
        $topic=Topic::find($id);
        // dd($subcategory);
        return view ('backend.topics.edit',compact('topics','topic'));
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
        //Validation
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable',

        ]);

        //if upload new image, delete old image
        $myfile=$request->old_photo;
        if($request->hasfile('photo'))
        {
            $imageName=time().'.'.$request->photo->extension();
            $name=$request->old_photo;

            if(file_exists(public_path($name))){
                unlink(public_path($name));
                $request->photo->move(public_path('backendtemplate/topicimg'),$imageName);
                $myfile='backendtemplate/topicimg/'.$imageName;
            }
        }

        //Update Data
        $topic=Topic::find($id);
        $topic->name=$request->name;
        $topic->photo=$myfile;
        $topic->save();

        //Redirect
        return redirect()->route('topics.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic=Topic::find($id);
        //delete related file from storage
        $topic->delete();
        return redirect()->route('topics.index');
    }
}
