@extends('layouts.dashboard')

@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ route('admin.tags.create') }}">Nuovo Tag</a>
        </div>
    </div>

    <div class="row">
        @foreach ($tags as $tag)
            <div class="col-12">
                <a href="{{ route('admin.tags.show', $tag->id) }}"> {{ $tag['name'] }} </a>
            </div>
        @endforeach
    </div>
@endsection
