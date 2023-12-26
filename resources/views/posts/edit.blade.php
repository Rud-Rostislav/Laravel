@extends('posts.base')

@section('title')
    Create Post
@endsection

@section('body')
    <h1>Edit posts</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="post"
          style="display: flex; flex-direction: column; width: 30vw; margin: 0 auto; gap: 25px;">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="title" value="{{old('title', $post->title)}}">
        <textarea name="text" placeholder="Text">{{old('text', $post->text)}}</textarea>
        <input type="submit" value="Edit">
    </form>
@endsection
