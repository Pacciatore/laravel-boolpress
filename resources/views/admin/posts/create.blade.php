@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Titolo: </label>
            <input type="text" name="title" required minlength="5" maxlength="255" value="{{ old('title', '') }}">
        </div>

        <div>
            <label for="content">Contenuto: </label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
        </div>

        <div>
            <input type="submit" value="Crea">
        </div>

    </form>
@endsection
