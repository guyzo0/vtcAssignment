<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Models\Post;
use App\Models\User;
use Session;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.list', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->post_name){
            Session::flash('error', 'The field post_name cannot be empty.');
            return redirect()->back();
          }
        if(!$request->comment){
            Session::flash('error', 'The field comment cannot be empty.');
            return redirect()->back();
        }

        $user = Auth::user();

        $post = new Post;
        $post->post_name = $request->post_name;
        $post->comment = $request->comment;
        $post->user_id = $user->id;
        $post->save();
        
        Session::flash('success', 'The user has been successfully created');
        return redirect(route('post.list'));
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
        return view('post.show', [
            'post' => $post
        ]);
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
        return view('post.edit', [
            'post' => $post
        ]);
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
        
        if(!$request->post_name){
            Session::flash('error', 'The field post_name cannot be empty.');
            return redirect()->back();
          }
        if(!$request->comment){
            Session::flash('error', 'The field comment cannot be empty.');
            return redirect()->back();
        }

        $user = Auth::user();

        $post = Post::find($id);
        $post->post_name = $request->post_name;
        $post->comment = $request->comment;
        $post->user_id = $user->id;
        $post->update();
        
        Session::flash('success', 'The user has been successfully updated.');
        return redirect(route('post.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        $accessToken = Auth::user()->token();
        $accessToken->revoke();
        Session::flash('success', 'The user has been successfully deleted.');
       return redirect(route('post.list'));
    }
}
