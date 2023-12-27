@extends('posts.base')

@section('title')
    All Posts
@endsection

@section('body')
    @if ($posts->isEmpty())
        <h1>No posts</h1>
    @else
        <h1 style="margin-top: 25px;">Posts count: {{$posts->count()}}</h1>
    @endif

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 50px; margin: 25px 0">
        @foreach($posts as $post)
            <div class="post" style="width: 25vw; border-radius: 25px; padding: 25px; display: flex;
            flex-direction: column;
                justify-content: space-between; gap: 25px;">
                <h2>{{$post->title}}</h2>
                <p>{{$post->text}}</p>
                <a style="color: black" href="{{route('posts.show', $post->id)}}">More</a>
            </div>
        @endforeach
    </div>

    <style>
        .post {
            transition: 0.5s;
            min-height: 30vh;
            box-shadow: #000000 0 0 5px -2px
        }

        .post:hover {
            transition: 0.5s;
            transform: scale(1.05);
            box-shadow: #000000 0 0 5px 0px
        }
    </style>
@endsection
