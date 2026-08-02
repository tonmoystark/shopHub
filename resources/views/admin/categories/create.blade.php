@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Create Category"
    description="Add a new product category."
>

    <x-admin.card>

        <form
            action="{{ route('categories.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="space-y-6">

                <x-admin.input
                    label="Category Name"
                    name="name"
                    placeholder="Enter category name"
                />

                <x-admin.image-upload
                    name="image"
                    label="Category Image"
                />

                <div>

                    <x-admin.checkbox
    name="status"
    label="Active"
    :checked="true"
/>

                </div>

                <div class="flex gap-3">

                    <x-admin.button
                        type="submit"
                        variant="success"
                    >
                        Save Category
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