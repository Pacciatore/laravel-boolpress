@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach ($category->posts as $post)
        <a href="{{ route('admin.posts.show', $post->id) }}">
            {{ $post->title }}
        </a>
    @endforeach
@endsection
