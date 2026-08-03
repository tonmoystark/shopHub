@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Edit Product"
    description="Update product information."
>

    <x-admin.card>

    {{-- Image Gallery --}}
    <div class="mb-8">

        <h3 class="mb-4 text-sm font-semibold text-gray-700">
            Current Images
        </h3>

        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">

            @foreach($product->images as $image)

                <div class="overflow-hidden rounded-xl border bg-white shadow-sm">

                    <img
                        src="{{ asset('storage/' . $image->image) }}"
                        class="h-40 w-full object-cover"
                        alt="Product Image"
                    >

                    <div class="p-3">

                        <form
                            action="{{ route('admin.products.images.destroy', $image) }}"
                            method="POST"
                            class="delete-form"
                        >
                            @csrf
                            @method('DELETE')

                            <x-admin.button
                                type="submit"
                                variant="danger"
                                class="w-full"
                            >
                                Delete Image
                            </x-admin.button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

    {{-- Product Update Form --}}
    <form
    action="{{ route('admin.products.update', $product) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    @include('admin.products._form', [
    'product' => $product,
])

    <x-admin.form-actions
        submitText="Update Product"
        :cancel="route('admin.products.index')"
    />

</form>

</x-admin.card>

</x-admin.page>

@endsection