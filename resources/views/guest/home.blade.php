<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Link CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Link script JS --}}
    <script src="{{ asset('js/front.js') }}" defer></script>

    <title> {{ config('app.name', 'Front Office') }} </title>

</head>

<body>
    <div id="root">

    </div>
</body>

</html>
