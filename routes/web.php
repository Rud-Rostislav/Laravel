<?php

use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $myPosts = Post::where('user_id', auth()->user()->id)->get();
    $posts = Post::where('user_id', '!=', auth()->user()->id)->get();
    return view('dashboard', compact('myPosts', 'posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)->except('index')->middleware('auth');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::resource('comments', \App\Http\Controllers\Posts\CommentController::class)->only(['store', 'destroy']);

require __DIR__ . '/auth.php';
