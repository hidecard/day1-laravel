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
    public function index() {
        $categories = Categories::all();
        $posts = Post::all();
        $feature_post = Post::latest()->first();
        $latest_post = Post::latest('created_at')->take(7)->get();

        return view('frontend.index', compact('categories','posts','feature_post','latest_post'));
    }

    public function detail($id) {
        $post = Post::find($id);
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.detail', compact('post','latest_post'));
    }

    public function userRegister() {
        return view('frontend.register');
    }

    public function store(Request $request) {
        $validate = validator($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false // default to user
        ]);

        return redirect()->route('UserLogin')->with('success', 'Registration successful! Please login.');
    }

    public function Login() {
        return view('frontend.userlogin');
    }

    public function UserLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user_id', Auth::user()->id);
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
