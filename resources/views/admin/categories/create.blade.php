@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Create Category"
    description="Add a new product category."
>

    <x-admin.card>

        <form
            action="{{ route('admin.categories.store') }}"
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

                <x-admin.form-actions
    submitText="Save Category"
    :cancel="route('admin.categories.index')"
/>

            </div>

        </form>

    </x-admin.card>

</x-admin.page>

@endsection