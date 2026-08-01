<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>

        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Role: {{ Auth::user()->role }}</p>
    </div>
</x-app-layout>