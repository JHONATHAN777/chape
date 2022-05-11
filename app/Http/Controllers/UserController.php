<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['users']=User::paginate(5);
        return view('user.index',$data);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userdata = request()->except('_token');

        
        if($request->hasFile('profile_picture')){

            $userdata['profile_picture']=$request->file('profile_picture')->store('uploads','public');
        }
        User::insert($userdata);
       // return response()->json($userdata);
       return redirect('user')->with('message','user created successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user=User::findOrFail($id);

        return view('user.edit', compact('user'));

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
        $userdata = request()->except(['_token','_method']);

        if($request->hasFile('profile_picture')){
            $user=User::findOrFail($id);

            Storage::delete('public/'.$user->profile_picture);

            $userdata['profile_picture']=$request->file('profile_picture')->store('uploads','public');
        }
        
        User::where('id','=',$id)->update($userdata);
        $user=User::findOrFail($id);

        return view('user.edit', compact('user'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id);

        if(Storage::delete('public/'.$user->profile_picture)){

              User::destroy($id);
        }
        

        return redirect('user')->with('message','User delete successfully');
    }
}
