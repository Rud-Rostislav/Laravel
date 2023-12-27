@extends('posts.base')

@section('title')
    All Posts
@endsection

@section('body')
    @if ($posts->isEmpty())
        <h1 class="mt-25">No posts</h1>
    @else
        <h1 class="mt-25">Posts count: {{$posts->count()}}</h1>
    @endif

    <div class="post-wrapper">
        @foreach($posts as $post)
            <div class="post">
                <h2>{{$post->title}}</h2>
                <p>{{$post->text}}</p>
                <a href="{{route('posts.show', $post->id)}}" class="link">More</a>
            </div>
        @endforeach
    </div>

    <style>
        .post:hover {
            transition: 1s;
            transform: scale(1.05);
            box-shadow: #000000 0 0 5px 0
        }
    </style>

@endsection
