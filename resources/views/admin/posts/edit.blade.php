@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Ci sono errori...
            </div>
        </div>
    @endif


    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- Titolo del post --}}
        <div @error('title') class="is-invalid" @enderror>

            <label for="title">Titolo: </label>
            <input type="text" name="title" required minlength="5" maxlength="255"
                value="{{ old('title', $post['title']) }}">

            @error('title')
                <div class="text-danger"> {{ $message }} </div>
            @enderror

        </div>

        {{-- Categoria post --}}
        <div @error('category_id') class="is-invalid" @enderror>

            <label for="category_id">Categoria: </label>
            <select name="category_id">
                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="text-danger"> {{ $message }} </div>
            @enderror

        </div>

        {{-- Contenuto del post --}}
        <div @error('content') class="is-invalid" @enderror>

            <label for="content">Contenuto: </label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', $post['content']) }}</textarea>

            @error('content')
                <div class="text-danger"> {{ $message }} </div>
            @enderror

        </div>

        {{-- Invio form --}}
        <div>
            <input type="submit" value="Aggiorna">
        </div>

        {{-- Ritorno alla vista dei post --}}
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}">Back to Post</a>
        </div>

    </form>
@endsection
