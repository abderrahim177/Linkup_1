<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LikeController extends Controller
{
    public function toggleLike(Post $post)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::id(); 

        $like = Like::where('post_id', $post->id)
                    ->where('user_id', $userId)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'post_id' => $post->id,
                'user_id' => $userId
            ]); 
        }

        return back();
    }
}