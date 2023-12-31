<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::all()->reverse();
        return view('posts.index', compact('posts'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.create');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function show(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($post->user_id);
        $post = Post::find($post->id);
        $comments = $post->comments()->with('user')->orderBy('created_at', 'desc')->get();
        return view('posts.show', compact('post', 'user', 'comments'));
    }

    public function edit(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        if (!$post->haveAccessPost()) {
            abort(403, 'Unauthorized action.');
        } else {
            $post = Post::find($post->id);
            return view('posts.edit', compact('post'));
        }
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        if (!$post->haveAccessPost()) {
            abort(403, 'Unauthorized action.');
        } else {
            $post = Post::find($post->id);
            $post->title = $request->title;
            $post->text = $request->text;
            $post->save();
            return redirect()->route('posts.show', $post->id);
        }
    }

    public function destroy(Post $post): RedirectResponse
    {
        if (!$post->haveAccessPost()) {
            abort(403, 'Unauthorized action.');
        } else {
            $post = Post::find($post->id);
            $post->delete();
            return redirect()->route('posts.index');
        }
    }
}
