<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return redirect()->route('posts.show', $request->post_id);
    }

    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('posts.show', $comment->post_id);
    }
}
