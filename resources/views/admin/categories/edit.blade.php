@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Ci sono errori...
            </div>
        </div>
    @endif


    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div @error('name') class="is-invalid" @enderror>
            <label for="name">Category name: </label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}">

            @error('name')
                <div class="text-danger"> {{ $message }} </div>
            @enderror

        </div>

        <input type="submit" value="Aggiorna">

    </form>
@endsection
