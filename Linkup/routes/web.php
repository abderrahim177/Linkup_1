<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\saveController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileUserController;

Route::middleware(['auth'])->group(function () {
    
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

Route::delete('/delete/{post}' , [PostController::class , 'destroy'])->name('delete');
// route of logout 
Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
 // add comments 
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    // delete comments
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    // like
Route::post('/posts/{post}/like', [LikeController::class, 'toggleLike'])->name('posts.like');
    // save post
Route::post('/saved/{post}', [saveController::class , 'save'])->name('save');
    // get all posts saved
Route::get('/saved-posts', [SaveController::class, 'index'])->name('saved.index');
    // following
Route::post('/user/{user}/follow', [FollowController::class, 'toggleFollow'])->name('user.follow');
    // profile user
Route::get('/profile-user/{user}' , [ProfileUserController::class , 'profileUser'])->name('profile_user');
});

