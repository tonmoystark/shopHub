@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Edit Category"
    description="Update category information."
>

    <x-admin.card>

        <form
            action="{{ route('admin.categories.update', $category) }}"
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

                <x-admin.form-actions
    submitText="Update Category"
    :cancel="route('admin.categories.index')"
/>

            </div>

        </form>

    </x-admin.card>

</x-admin.page>

@endsection