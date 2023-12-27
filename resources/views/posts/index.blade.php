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
            <div class="post" style="justify-content: @if( Auth::check()) space-between @else center @endif">
                <h2>{{$post->title}}</h2>
                <p>{{$post->text}}</p>
                @if( Auth::check())
                    <a href="{{route('posts.show', $post->id)}}" class="link">More</a>
                @endif
            </div>
        @endforeach
    </div>

    <style>
        .post:hover {
            transition: 0.5s;
            box-shadow: #000000 0 0 5px 0
        }
    </style>

@endsection
