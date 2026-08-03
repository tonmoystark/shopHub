@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Edit Product"
    description="Update product information."
>

    <x-admin.card>

        <form
            action="{{ route('admin.products.update', $product) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">

                <x-admin.input
                    name="name"
                    label="Product Name"
                    :value="$product->name"
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
                            @selected(old('category_id', $product->category_id) == $category->id)
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </x-admin.select>

                <x-admin.input
                    name="sku"
                    label="SKU"
                    :value="$product->sku"
                    required
                />

                <x-admin.input
                    name="stock"
                    type="number"
                    :value="$product->stock"
                    label="Stock"
                    required
                />

                <x-admin.input
                    name="price"
                    type="number"
                    step="0.01"
                    :value="$product->price"
                    label="Price"
                    required
                />

                <x-admin.input
                    name="sale_price"
                    type="number"
                    step="0.01"
                    :value="$product->sale_price"
                    label="Sale Price"
                />

            </div>

            <x-admin.textarea
                name="description"
                label="Description"
                rows="6"
                :value="$product->description"
            />

            <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:gap-8">

                <x-admin.checkbox
                    name="status"
                    label="Active"
                    :checked="$product->status"
                />

                <x-admin.checkbox
                    name="is_featured"
                    label="Featured Product"
                    :checked="$product->is_featured"
                />

            </div>

            <div class="mt-6">

                <h3 class="mb-4 text-sm font-semibold text-gray-700">
                    Current Images
                </h3>

                <div class="mb-6 flex flex-wrap gap-4">

                    @forelse($product->images as $image)

                        <img
                            src="{{ asset('storage/' . $image->image) }}"
                            alt="Product Image"
                            class="h-28 w-28 rounded-xl border object-cover"
                        >

                    @empty

                        <p class="text-sm text-gray-500">
                            No images uploaded.
                        </p>

                    @endforelse

                </div>

                <x-admin.image-upload
                    name="images"
                    label="Add More Images"
                    multiple
                    help="Upload additional images. Existing images will remain."
                />

            </div>

            <x-admin.form-actions
                submitText="Update Product"
                :cancel="route('admin.products.index')"
            />

        </form>

    </x-admin.card>

</x-admin.page>

@endsection