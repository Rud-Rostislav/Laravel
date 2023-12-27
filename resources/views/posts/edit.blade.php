@extends('posts.base')

@section('title')
    Edit Post {{ $post->id }}
@endsection

@section('body')
    <form action="{{ route('posts.update', $post->id) }}" method="post" class="form-create-edit" style="width: 50vw">
        @csrf
        @method('PUT')
        <h1>Edit posts {{ $post->id }}</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif
        <label>
            <input type="text" name="title" placeholder="title" value="{{old('title', $post->title)}}"
                   class="input-textarea">
        </label>
        <label>
            <textarea name="text" placeholder="Text" class="input-textarea">{{old('text', $post->text)}}</textarea>
        </label>
        <input type="submit" value="Edit" class="link">
    </form>
@endsection
