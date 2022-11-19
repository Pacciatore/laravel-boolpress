@extends('layouts.dashboard')

@section('content')
    <h1> {{ $tag->name }} </h1>

    @foreach ($tag->posts as $post)
        <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }} </a>
    @endforeach

    {{-- Pulsante per editar il tag --}}
    <div class="mt-5">
        <a class="btn-secondary p-2" href="{{ route('admin.tags.edit', $tag->id) }}">Edit tag</a>
    </div>

    {{-- Pulsante per tornare all'index dei tag --}}
    <div class="mt-2">
        <a class="btn-primary p-2" href="{{ route('admin.tags.index') }}">Back to all tags</a>
    </div>
@endsection
