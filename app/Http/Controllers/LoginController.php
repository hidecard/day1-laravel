<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin(){
        return view('frontend.login');
    }
    public function login(Request  $request){
        $credentials = $request -> validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();  
            return redirect()->intended('post/list') ;
        }
    }
}
