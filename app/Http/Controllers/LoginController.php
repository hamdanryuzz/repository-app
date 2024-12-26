<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view("login");
    }

    public function login(Request $request){
        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);
        
        if(Auth::attempt($request->only("email","password"))){
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email'=> 'The provided credentials do not match our records.']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
