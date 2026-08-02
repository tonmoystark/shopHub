

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

    <a href="{{ route('categories.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        + Add Category
    </a>
</div>
</div>