@extends('posts.base')

@section('title')
    All Posts
@endsection

@section('body')
    @if ($posts->isEmpty())
        <h1>No posts</h1>
    @else
        <h1 style="margin: 25px 0">All posts</h1>
        <h2>Posts count: {{$posts->count()}}</h2>
    @endif

    @foreach($posts as $post)
        <div
            style="margin: 50px auto; border: #2c2f34 1px solid; width: 30vw; border-radius: 25px; padding: 25px 0; display: flex; flex-direction: column; gap: 10px">
            <h2>{{$post->title}}</h2>
            <p>{{$post->text}}</p>
            <div style="display: flex; flex-direction: column; gap: 10px">
                <a style="color: black" href="{{route('posts.show', $post->id)}}">More</a>
                <a style="color: black" href="{{route('posts.edit', $post->id)}}">Edit</a>
                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete"
                           style="color: white; padding: 5px 10px; border-radius: 10px; border: none; background: #00afff;">
                </form>
            </div>
        </div>
    @endforeach

@endsection
