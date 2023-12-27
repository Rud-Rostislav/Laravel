<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): RedirectResponse
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;

        if (auth()->check()) {
            $post->user_id = auth()->user()->id;
        } else {
            $post->user_id = 1;
        }

        $post->save();
        return redirect()->route('posts.index');
    }

    public function show(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($post->user_id);
        $post = Post::find($post->id);
        return view('posts.show', compact('post', 'user'));
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

    public function update(Request $request, Post $post): RedirectResponse
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
