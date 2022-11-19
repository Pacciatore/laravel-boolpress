@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div @error('name') class="is-invalid" @enderror>
            <label for="name">Nome Tag: </label>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}">

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <input type="submit" value="Edit">

    </form>

    {{-- Pulsante per tornare al tag --}}
    <div class="mt-5">
        <a class="btn-secondary p-2" href="{{ route('admin.tags.show', $tag->id) }}">Back to {{ $tag->name }}</a>
    </div>
@endsection
