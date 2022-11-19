@extends('layouts.dashboard')

@section('content')
    <h1 class="mb-5">Creazione nuovo tag</h1>

    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf

        <div @error('name') class="is-invalid" @enderror>
            <label for="name">Nome Tag: </label>
            <input type="text" name="name" value="{{ old('name', '') }}">

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <input type="submit" value="Crea">

    </form>
@endsection
