@extends('posts.base')

@section('title')
    Create Post
@endsection

@section('body')
    <form action="{{ route('posts.store') }}" method="post" class="form-create-edit">
        @csrf
        <h1>Create posts</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif

        <label>
            <input type="text" name="title" placeholder="title" class="input-textarea"
                   style="text-transform: capitalize" value="{{ old('title') }}">
        </label>
        <label>
            <textarea name="text" placeholder="Text" class="input-textarea">{{ old('text') }}</textarea>
        </label>
        <input type="submit" value="Submit" class="link">
    </form>
@endsection
