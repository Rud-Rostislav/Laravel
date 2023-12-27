@extends('posts.base')

@section('title')
    Create Post
@endsection

@section('body')

    <form action="{{ route('posts.store') }}" method="post" class="form-create-edit">
        @csrf
        <h1>Create posts</h1>
        <input type="text" name="title" placeholder="title" class="input-textarea">
        <textarea name="text" placeholder="Text" class="input-textarea"></textarea>
        <input type="submit" value="Submit" class="link">
    </form>
@endsection
