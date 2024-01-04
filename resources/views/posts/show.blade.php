@extends('posts.base')

@section('title')
    Post {{ $post->id }}
@endsection

@section('body')
    <div class="post-wrapper" style="min-height: 60vh; align-items: center;">
        <div class="post" style="min-height: 50vh; width: 50%;
        justify-content: @if( Auth::check() && $post->haveAccessPost()) space-between @else center @endif;">

            <div>
                <p>Post ID: {{ $post->id }}</p>
                <p>Created by:</p>
                <p>{{ $user->id.'. '.$user->name . ' - ' . $user->email }}</p>
                <p>Created at:</p>
                <p>{{ $post->created_at->format('Y-m-d H:i:s') }}</p>
                <p>Updated at:</p>
                <p>{{ $post->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <div style="font-size: 1.25rem">
                <div style="display: flex; flex-direction: column; gap: 50px">
                    <p>{{$post->title}}</p>
                    <p>{{$post->text}}</p>
                </div>
            </div>

            @if (Auth::check() && $post->haveAccessPost())
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
            @endif
        </div>
    </div>


    @if($comments->count() == 0)
        <h2>No comments</h2>
    @else
        <h2>Comments</h2>
        <p>Count: {{$comments->count()}}</p>
    @endif

    <form action="{{ route('comments.store') }}" method="post" class="form-create-edit" style="min-height: 20vh">
        @csrf
        <h2>Create comment</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif

        <label>
            <input type="text" name="comment" placeholder="Comment" class="input-textarea" value="{{ old('comment') }}">
        </label>

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <input type="submit" value="Send comment" class="link">
    </form>

    <div class="post-wrapper" style="min-height: 40vh; align-items: center; flex-direction: row; padding: 50px 0">
        @foreach($comments as $comment)
            <div class="post" style="min-height: 5vh; width: 50%;
            justify-content: @if(Auth::check() && $post->haveAccessPost()) space-between @else center @endif;">
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->comment }}</p>
                <p>{{ $comment->created_at->format('Y-m-d | H:i') }}</p>

                @if (Auth::check() && $comment->haveAccessComment())
                    <div style="display: flex; gap: 25px; flex-wrap: wrap;">
                        <form action="{{route('comments.destroy', $comment->id)}}" method="post" class="link"
                              style="background: #622020">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete"
                                   onclick="return confirm('Are you sure to delete comment?')"
                                   style="background: #622020; width: 100%;  font-size: 1.25rem; border: none; color: white;"/>
                        </form>
                    </div>
                @endif

            </div>
        @endforeach
    </div>

@endsection
