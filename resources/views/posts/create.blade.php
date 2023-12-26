@extends('posts.base')

@section('title')
    Create Post
@endsection

@section('body')
    <h1>Create posts</h1>

    <form action="{{ route('posts.store') }}" method="post"
          style="display: flex; flex-direction: column; width: 30vw; margin: 0 auto; gap: 25px;">
        @csrf
        <input type="text" name="title" placeholder="title">
        <textarea name="text" placeholder="Text"></textarea>
        <input type="submit" value="Submit">
    </form>
@endsection
