@extends('posts.base')

@section('title')
    Edit Post {{ $post->id }}
@endsection

@section('body')

    <form action="{{ route('posts.update', $post->id) }}" method="post" class="form-create-edit">
        @csrf
        @method('PUT')
        <h1>Edit posts {{ $post->id }}</h1>
        <input type="text" name="title" placeholder="title" value="{{old('title', $post->title)}}"
               class="input-textarea">
        <textarea name="text" placeholder="Text" class="input-textarea">{{old('text', $post->text)}}</textarea>
        <input type="submit" value="Edit" class="link">
    </form>

@endsection
