@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Edit Category"
    description="Update category information."
>

    <x-admin.card>

        <form
            action="{{ route('categories.update', $category) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="space-y-6">

                <x-admin.input
                    label="Category Name"
                    name="name"
                    :value="$category->name"
                    placeholder="Enter category name"
                />

                <x-admin.image-upload
                    name="image"
                    label="Category Image"
                    :preview="$category->image ? asset('storage/'.$category->image) : null"
                />

                <div>

                    <x-admin.checkbox
    name="status"
    label="Active"
    :checked="$category->status"
/>

                </div>

                <div class="flex gap-3">

                    <x-admin.button
                        type="submit"
                        variant="success"
                    >
                        Update Category
                    </x-admin.button>

                    <x-admin.button
                        href="{{ route('categories.index') }}"
                        variant="secondary"
                    >
                        Cancel
                    </x-admin.button>

                </div>

            </div>

        </form>

    </x-admin.card>

</x-admin.page>

@endsection