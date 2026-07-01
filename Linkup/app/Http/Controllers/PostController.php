<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\postCreatRequest;
use App\Http\Requests\postUpdateRequest;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('welcome', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(postCreatRequest $request)
    {
         $credentials = $request->validated();
         $credentials['user_id'] = $request->user()->id;
          $post = Post::create($credentials);
           return redirect()->route('dashboard')->with('success', 'post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('editPage',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(postUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update($validated);
        return redirect()->route('dashboard')->with('success', 'Updated with success !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
