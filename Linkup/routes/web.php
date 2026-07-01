<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/creat', [PostController::class , 'store'])->name('creat.user');
Route::resource('posts' , PostController::class);
 
Route::get('/login' , function(){return view('auth.login');});

Route::get('/register' , [AuthController::class , "register"])->name('register');
Route::post('/register' , [AuthController::class , "save"])->name('save.user');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'check'])->name('check_user');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');