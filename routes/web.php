<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\StripeController;
use App\Models\Catalogue;
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
    $catalogue = Catalogue::all();
    return view('shop')->with('catalogue', $catalogue);
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
    
    $user = Auth::user();
    $orders = $user->payments;
    // $posts = Post::all();
    return view('userAccount')->with(['posts' => $posts, 'orders' => $orders]);

});
Route::get('/create-blog', function () {
    return view('create-blog');
});

Route::get('/admin', function () {
    
    $catalogue = Catalogue::all();
    return view('admin')->with('catalogue', $catalogue);
});

Route::get('/checkoutSuccess', function () {
    return view('checkoutSuccess');
});
Route::get('/cart', [StripeController::class,'index'])->name('cart');
Route::post('/checkout', [StripeController::class,'checkout'])->name('checkout');
Route::get('/success/{product_id}', [StripeController::class,'success'])->name('success');


Route::post('/register', [UserController::class,'register']);
Route::get('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

Route::post('/create-post', [PostController::class,'createPost']);
Route::get('/edit-post/{post}', [PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class,'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class,'deletePost']);

Route::post('/create-product', [CatalogueController::class,'createproduct']);
Route::get('/edit-product/{product}', [CatalogueController::class,'showItemEditScreen']);
Route::put('/edit-product/{product}', [CatalogueController::class,'updateproduct']);
Route::delete('/delete-product/{product}', [CatalogueController::class,'deleteproduct']);

Route::post('/create-product', [CatalogueController::class,'createCatalogue']);