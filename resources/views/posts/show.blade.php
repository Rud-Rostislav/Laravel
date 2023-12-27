@extends('posts.base')

@section('title')
    Post {{ $post->id }}
@endsection

@section('body')
    <div class="post-wrapper" style="min-height: 84vh; align-items: center;">
        <div class="post" style="justify-content: space-between; min-height: 50vh; width: 50%">
            <div>
                <p>User ID: {{ $post->user_id }}</p>
                <p>Created at: {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
                <p>Updated at: {{ $post->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
            <div>
                <p>{{$post->id}}. {{$post->title}}</p>
                <p>{{$post->text}}</p>
            </div>

            <div style="display: flex; gap: 25px; flex-wrap: wrap;">
                <a class="link" href="{{route('posts.edit', $post->id)}}">Edit</a>
                <form action="{{route('posts.destroy', $post->id)}}" method="post" class="link"
                      style="background: #622020">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure?')"
                           style="background: #622020; width: 100%;  font-size: 1.25rem; border: none; color: white;"/>
                </form>
            </div>
        </div>
    </div>
@endsection
