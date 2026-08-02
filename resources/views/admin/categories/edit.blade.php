@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <x-admin.page-header
        title="Edit Category"
        description="Update category information."
    />

    <x-admin.card>

        <form
            action="{{ route('categories.update', $category) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <x-admin.input
                label="Category Name"
                name="name"
                :value="$category->name"
            />

            <div class="mb-5">

                <label class="mb-2 block text-sm font-medium">
                    Category Image
                </label>

                <img
                    src="{{ asset('storage/'.$category->image) }}"
                    class="mb-3 h-24 w-24 rounded-lg object-cover"
                >

                <input
                    type="file"
                    name="image"
                >

            </div>

            <label class="mb-6 flex items-center gap-2">

                <input
                    type="checkbox"
                    name="status"
                    value="1"
                    @checked($category->status)
                >

                Active

            </label>

            <x-admin.button
                type="submit"
                variant="success"
            >
                Update Category
            </x-admin.button>

        </form>

    </x-admin.card>

</div>

@endsection