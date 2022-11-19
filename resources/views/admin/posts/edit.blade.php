@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Ci sono errori...
            </div>
        </div>
    @endif


    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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

        {{-- Immagine del post --}}
        <div>
            <div @error('image') class="is-invalid" @enderror>
                <label for="image">Carica immagine: </label>
                <input type="file" name="image">
            </div>
            @if ($post->cover_path)
                <div class="img-container">
                    <img class="img-fluid" src="{{ asset('storage/' . $post->cover_path) }}" alt="{{ $post->title }}">
                </div>
            @endif

            @error('image')
                <div class="text-danger"> {{ $message }} </div>
            @enderror

        </div>


        {{-- Checkbox dei tag --}}
        @if ($errors->any())
            {{-- Qua trattiamo i dati presenti nel form rimbalzato --}}
            <div @error('tags') class="is-invalid" @enderror>
                <label>Tags: </label>

                @foreach ($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label>{{ $tag->name }}</label>
                @endforeach
            </div>
        @else
            {{-- Qua trattiamo i dati presenti nella tabella Tags --}}
            <div>
                <label>Tags: </label>
                @foreach ($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    <label>{{ $tag->name }}</label>
                @endforeach
            </div>
        @endif

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
