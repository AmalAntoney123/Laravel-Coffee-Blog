<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/blog', function () {
    // $posts = auth()->user()->userPosts()->latest()->get();
    $posts = Post::all();
    return view('blog')->with('posts', $posts);
});
Route::get('/userAccount', function () {
    $posts = auth()->user()->userPosts()->latest()->get();
    // $posts = Post::all();
    return view('userAccount')->with('posts', $posts);
});
Route::get('/create-blog', function () {
    return view('create-blog');
});

Route::post('/register', [UserController::class,'register']);
Route::get('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

Route::post('/create-post', [PostController::class,'createPost']);
Route::get('/edit-post/{post}', [PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class,'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class,'deletePost']);