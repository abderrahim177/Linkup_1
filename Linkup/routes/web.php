<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::resource('posts' , PostController::class);
 
Route::get('/login' , function(){
    return view('auth.login');
});
Route::get('/register' , [AuthController::class , "register"])->name('register');
Route::get('login' , [AuthController::class , "login"])->name('login');
Route::post('save-user' , [AuthController::class , "save"])->name('save.user');