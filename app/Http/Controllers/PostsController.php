<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PostsController extends Controller
{

    public function __construct()

    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request);
        $searchTerm = $request->input('searchTerm');
        if(is_null($searchTerm)){
            $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(8);
        } else {
//            if($request->input('searchBy') == 'title'){
//                $posts  = Post::searchByTitle($searchTerm)->with('user')->orderBy('posts.created_at', 'asc')->paginate(8);
//            }
//            if($request->input('searchBy') == 'user'){
//                $posts  = Post::searchByUser($searchTerm)->with('user')->orderBy('posts.created_at', 'asc')->paginate(8);
//            }
            $posts  = Post::searchBy($searchTerm)->with('user')->orderBy('posts.created_at', 'asc')->paginate(8);
        }
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        if(!Auth::check()){
//            return redirect()->action('Auth\AuthController@postLogin');
//        }
        return view('posts.create');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = new Post();
        $post->created_by = Auth::user()->id;
//============== $post->content = $request->content; ======= also valid ============= //
        return $this->validateAndSave($request, $post);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(!$post){
            Log::info("Post with ID $id cannot be found.");
            abort(404);
        }
//        dd($post);
        return view('posts.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post){
            Log::info("Post with ID $id cannot be found.");
            abort(404);
        }
        return view('posts.edit')->with('post', $post);
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
        $post = Post::findOrFail($id);
        return $this->validateAndSave($request, $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if(!$post){
            Log::info("Post with ID $id cannot be found.");
            abort(404);
        }
        $post->delete();
        $request->session()->flash('message', 'Deletion Successful.');
        return redirect()->action('PostsController@index');
    }

    private function validateAndSave (Request $request,Post $post){
        $request->session()->flash('message', 'Message was not saved successfully.');
        $this->validate($request, Post::$rules);
        $request->session()->forget('ERROR_MESSAGE');
        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->save();
        Log::info($request->all());
        $request->session()->flash('message', 'Post was saved successfully!');
        return redirect()->action('PostsController@index');
    }


}
