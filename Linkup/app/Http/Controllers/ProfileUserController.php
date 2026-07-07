<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileUserController extends Controller
{
    public function profileUser(User $user){
        $posts = $user->posts()->with(['comments' , 'likes'])->latest()->get();

        return view('profile-user' , compact('posts'));
    }
}
