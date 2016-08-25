<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts(Request $request, $id)
    {
        $user = User::find($id);
        $posts = $user->posts()->paginate(10);
//        dd($posts);
        return view('user.posts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//            $this->validate($request, User::$rules);
//            $user = new User();
//            $user->id = Auth::user()->id;
//            return $this->validateAndSave($request, $user);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            Log::info("User with ID $id cannot be found.");
            abort(404);
        }
        return view('user.edit')->with('user', $user);
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
        $user = User::findOrFail($id);
        return $this->validateAndSave($request, $user);
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
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.account')->with('user', $user);
    }

    private function validateAndSave (Request $request,User $user){
//        dd($request);
        if($request->input('password') === $request->input('confirmPassword')) {
            $request->session()->flash('message', 'User Data was not saved.');
            $this->validate($request, User::$rules);
            $request->session()->forget('ERROR_MESSAGE');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            //        dd($user);
            $user->save();
            Log::info($request->all());
            $request->session()->flash('message', 'User was saved successfully!');
            return redirect()->action('UserController@edit', $user->id);
        }
    }
}
