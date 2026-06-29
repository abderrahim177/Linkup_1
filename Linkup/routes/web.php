<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::resource('posts' , PostController::class);
 
Route::get('/login' , function(){
    return view('auth.login');
});
Route::get('/register' , function(){
   return view('auth.register');
});