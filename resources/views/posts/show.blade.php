@extends('posts.base')

@section('title')
    All Posts
@endsection

@section('body')
    <h1>Show posts</h1>

    <p>{{$post->id}}. {{$post->title}}</p>
    <p>{{$post->text}}</p>
    <p>{{ $post->created_at }}</p>
    <p>{{ $post->updated_at }}</p>
    <p>{{ $post->user_id }}</p>
    <a href="{{route('posts.index')}}">Back</a>

    <div style="display: flex; flex-direction: column; gap: 10px">
        <a style="color: black" href="{{route('posts.edit', $post->id)}}">Edit</a>
        <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete"
                   style="color: white; padding: 5px 10px; border-radius: 10px; border: none; background: #00afff;">
        </form>
    </div>
@endsection
