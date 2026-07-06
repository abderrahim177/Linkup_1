<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SavedPost; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    public function save(Post $post)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::id();

        $savedPost = SavedPost::where('user_id', $userId)
            ->where('post_id', $post->id)
            ->first();

        if ($savedPost) {
            $savedPost->delete();
        } else {
            SavedPost::create([
                'user_id' => $userId,
                'post_id' => $post->id
            ]);
        }

        return back();
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user(); 

        $posts = $user->savedPosts()->with(['user', 'comments'])->latest()->get();
        
        return view('saves.index', compact('posts'));
    }
}