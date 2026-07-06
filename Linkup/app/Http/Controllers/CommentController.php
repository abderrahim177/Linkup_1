<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequests;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Post;
class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(CommentRequests $request, Post $post){
        $request->validated();
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->content,
        ]);
        return back()->with('success');
    }
    public function destroy(Comment $comment){
        $this->authorize('delete' , $comment);
        $comment->delete();

        return back()->with('success');
    }
}
