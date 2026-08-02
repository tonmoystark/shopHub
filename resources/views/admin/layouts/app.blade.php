<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHub Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Main Content --}}
        <div class="flex-1">

            {{-- Navbar --}}
            @include('admin.partials.navbar')

            <main class="p-6">
                @include('admin.partials.flash-message')
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>