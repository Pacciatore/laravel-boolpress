@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach ($category->posts as $post)
        <a href="{{ route('admin.posts.show', $post->id) }}">
            {{ $post->title }}
        </a>
    @endforeach

    {{-- Pulsante edit categoria --}}
    <div class="mt-5">
        <a class="btn-secondary p-2" href="{{ route('admin.categories.edit', $category->id) }}">Edit Category</a>
    </div>

    {{-- Pulsante eliminazione categoria --}}
    <div class="mt-2">
        <form onsubmit="return confirm('Are you sure?')" action="{{ route('admin.categories.destroy', $category->id) }}"
            method="POST">
            @csrf
            @method('DELETE')

            <input class="btn-danger" type="submit" value="Delete Category">
        </form>

    </div>

    {{-- Pulsante per tornare a index delle categorie --}}
    <div class="mt-2">
        <a class="btn-primary p-2" href="{{ route('admin.categories.index') }}">Back to Categories</a>
    </div>
@endsection
