@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach ($category->posts as $post)
        <a href="{{ route('admin.posts.show', $post->id) }}">
            {{ $post->title }}
        </a>
    @endforeach


    <div class="mt-5">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit Category</a>
    </div>

    <div>
        <a href="{{ route('admin.categories.index') }}">Back to Categories</a>
    </div>
@endsection
