
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="max-w-5xl mx-auto">
<h1 class="text-2xl font-bold mb-5">
    Categories
</h1>

@forelse($categories as $category)

    <p>{{ $category->name }}</p>

@empty

    <p>No Categories Found.</p>

@endforelse

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Categories</h1>

    <a href="{{ route('categories.create') }}">
        <x-admin.button variant="primary">
            Add Category
        </x-admin.button>
    </a>
</div>

</div>