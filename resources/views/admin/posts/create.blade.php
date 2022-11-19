@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Ci sono errori...
            </div>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Titolo post --}}
        <div @error('title') class="is-invalid" @enderror>

            <label for="title">Titolo: </label>
            <input type="text" name="title" required minlength="5" maxlength="255" value="{{ old('title', '') }}">

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
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', -1) ? 'selected' : '' }}>
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
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>

            @error('content')
                <div class="text-danger"> {{ $message }} </div>
            @enderror

        </div>

        {{-- Checkbox dei tag --}}
        <div @error('tags') class="is-invalid" @enderror>

            <label>Tags: </label>

            @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                <label>{{ $tag->name }}</label>
            @endforeach

        </div>

        {{-- Caricamento immagine post --}}
        <div @error('image') class="is-invalid" @enderror>
            <label for="image">Carica immagine: </label>
            <input type="file" name="image">
        </div>

        {{-- Invio del form --}}
        <div>
            <input type="submit" value="Crea">
        </div>

    </form>
@endsection
