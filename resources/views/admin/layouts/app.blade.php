<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        @yield('title', 'Admin Panel') - ShopHub
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100 text-gray-900">

    <div
        class="min-h-screen"
        x-data="{ sidebarOpen: false }"
    >

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')


        {{-- Main Area --}}
        <div class="lg:pl-64">

            {{-- Navbar --}}
            @include('admin.partials.navbar')


            {{-- Content --}}
            <main class="p-4 sm:p-6 lg:p-8">

                @include('admin.partials.flash-message')

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>