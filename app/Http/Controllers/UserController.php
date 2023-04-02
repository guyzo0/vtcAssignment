<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Post;
use Session;

class UserController extends Controller
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
        $users = User::all();
        return view('user.list', [
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', [
            'user' => $user
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
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user,
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
            'repeat_password' => 'required'
        ]);

        if($validate->fails() || $request->password != $request->repeat_password){
            Session::flash('error', 'The form isn\'t valid');
            return redirect()->back();
        }

       $user = User::findOrFail($id);
       $password = Hash::make($request->password);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $password;
       $user->update();

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
        $user = User::find($id);
        $post = Post::where('user_id', $id)->get();
        if(!$post){
            $user->delete();
            Session::flash('success', 'The user has been successfully deleted.');
            return redirect(route('login'));
        } else {
            Session::flash('error', 'The post cannot be deleted because of existing post');
            return redirect()->back();
        }
    }
}
