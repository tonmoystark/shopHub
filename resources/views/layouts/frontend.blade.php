<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    {{-- Frontend Navigation --}}
    @include('layouts.frontend.navigation')

    <main>

        @yield('content')

    </main>
{{-- Footer --}}
    @include('frontend.partials.footer')
</body>

</html>