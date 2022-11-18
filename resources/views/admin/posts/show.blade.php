@extends('layouts.dashboard')

@section('content')
    <h1> {{ $post->title }} </h1>

    @if ($post->category)
        <a href="{{ route('admin.categories.show', $post->category->id) }}">
            {{ $post->category->name }}
        </a>
    @else
        <p>Nessuna categoria</p>
    @endif

    <p> {{ $post->content }} </p>

    <div class="tags">
        Tags:
        @foreach ($post->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach
    </div>

    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit Post</a>
    </div>

    <div class="mt-2">
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            {{--
            TODO:
                Bugfix:
                    Quando appare il confirm, la scelta non si pone perché il post
                    viene eliminato lo stesso
            --}}
            <input onclick="confirm('Are you sure?')" type="submit" value="Delete Post">
        </form>
    </div>

    <div>
        <a href="{{ route('admin.posts.index') }}">Back to Posts</a>
    </div>
@endsection
