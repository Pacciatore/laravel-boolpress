@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label for="title">Titolo: </label>
            <input type="text" name="title" required minlength="5" maxlength="255"
                value="{{ old('title', $post['title']) }}">
        </div>

        <div>
            <label for="content">Contenuto: </label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', $post['content']) }}</textarea>
        </div>

        <div>
            <input type="submit" value="Aggiorna">
        </div>

        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}">Back to Post</a>
        </div>

    </form>
@endsection
