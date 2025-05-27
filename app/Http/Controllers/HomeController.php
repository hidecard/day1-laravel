<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $posts = Post::all();
        $feature_post = Post::latest()->first();
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.index',compact('categories','posts','feature_post','latest_post'));
    }
    public function detail($id){
        $post = Post::find($id);
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.detail' , compact('post','latest_post'));
    }
    public function userRegister(){
        return view('frontend.register');
    }
    public function store(Request $request){
        $valicate = validator($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required'
        ]);
        if($valicate->fails()){
            return back()->withErrors($valicate);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if($user){
            return redirect()->back()->with('success','Success!');
        }
    }
    public function Login(){
        return view('frontend\userlogin');
    }
    public function UserLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    }
}
