<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::all();
         return view ('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users=User::all();
         return view('backend.users.create');
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
            'email' => 'required',
            'password' => 'required',
            'image' => 'required',
            'university_school' => 'required',
            'work_organization' => 'required',
            'role' => 'required',
         ]);

         //File Upload
         $imageName=time().'.'.$request->image->extension();
         $request->image->move(public_path('backendtemplate/userimg'),$imageName);
         $myfile='backendtemplate/userimg/'.$imageName;

         //Store Data
         $user = new User;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password =Hash::make($request->password);
         $user->image=$myfile;
         $user->university_school = $request->university_school;
         $user->work_organization = $request->work_organization;
         $user->assignRole($request->role);
         $user->save();

        //Redirect
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);//obj
        return view('backend.users.show',compact('user'));
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
        $user=User::find($id);
        //delete related file from storage
        $user->delete();
        return redirect()->route('users.index'); 
    }
}
