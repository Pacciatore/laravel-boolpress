@extends('layouts.dashboard')

@section('content')
    <h1> {{ $post->title }} </h1>
    <p> {{ $post->content }} </p>

    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit Post</a>
    </div>

    <div class="ps-5">
        <a href="{{ route('admin.posts.index') }}">Back to Posts</a>
    </div>
@endsection
