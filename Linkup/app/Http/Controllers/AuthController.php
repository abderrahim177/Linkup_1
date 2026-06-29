<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }
    public function login(){
        return view("auth.login");
    }
   public function save(Request $request) {
    $validate = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8',
        'headline' => 'required|string',
    ]);
}
    public function check(Request $request){
        $validate = $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);
    }
}
