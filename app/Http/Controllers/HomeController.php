<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $posts = Post::all();
        $feature_post = Post::latest()->first();
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.index',compact('categories','posts','feature_post','latest_post'));
    }
}
