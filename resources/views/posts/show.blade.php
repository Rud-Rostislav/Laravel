@extends('posts.base')

@section('title')
    All Posts
@endsection

@section('body')
    <h1>Show posts</h1>

    <p>{{$post->title}}</p>
    <p>{{$post->text}}</p>
    <p>{{ $post->created_at }}</p>
    <p>{{ $post->updated_at }}</p>
    <p>{{ $post->user_id }}</p>
    <a href="{{route('posts.index')}}">Back</a>
@endsection
