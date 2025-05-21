<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('backend.post.index');
    }
    public function create(){
        return view('backend.post.create');
    }
}
