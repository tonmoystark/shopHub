@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Create Product"
    description="Add a new product to your store."
>

    <x-admin.card>

        <form
            action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="grid gap-6 md:grid-cols-2">

                <x-admin.input
                    name="name"
                    label="Product Name"
                    required
                />

                <x-admin.select
                    name="category_id"
                    label="Category"
                    required
                >

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id') == $category->id)
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </x-admin.select>

                <x-admin.input
                    name="sku"
                    label="SKU"
                    required
                />

                <x-admin.input
                    name="stock"
                    type="number"
                    label="Stock"
                    required
                />

                <x-admin.input
                    name="price"
                    type="number"
                    step="0.01"
                    label="Price"
                    required
                />

                <x-admin.input
                    name="sale_price"
                    type="number"
                    step="0.01"
                    label="Sale Price"
                />

            </div>

            <x-admin.textarea
                name="description"
                label="Description"
                rows="6"
            />

            <div class="mt-6 flex gap-6">

                <x-admin.checkbox
                    name="status"
                    label="Active"
                    :checked="true"
                />

                <x-admin.checkbox
                    name="is_featured"
                    label="Featured Product"
                />

            </div>

            <div class="mt-6">

                <x-admin.image-upload
                    name="images"
                    label="Product Images"
                    multiple
                    help="Upload JPG, PNG or WEBP images. Maximum size: 2 MB each."
                />

            </div>

            <x-admin.form-actions
    submitText="Save Product"
    :cancel="route('admin.products.index')"
/>

        </form>

    </x-admin.card>

</x-admin.page>

@endsection