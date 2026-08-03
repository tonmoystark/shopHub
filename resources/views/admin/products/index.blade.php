@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Products"
    description="Manage all products."
>

    <x-slot:actions>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

            <x-admin.search
                placeholder="Search products..."
            />

            <x-admin.button
                href="{{ route('admin.products.create') }}"
            >
                + Add Product
            </x-admin.button>

        </div>

    </x-slot:actions>
    <form
    id="product-filters"
    method="GET"
    class="mb-6 grid gap-4 md:grid-cols-5"
>

    <x-admin.search
        name="search"
        :value="$search"
        placeholder="Search products..."
    />

    <x-admin.select
        name="category_id"
    >

        <option value="">
            All Categories
        </option>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(request('category') == $category->id)
            >
                {{ $category->name }}
            </option>

        @endforeach

    </x-admin.select>

    <x-admin.select name="status">

        <option value="">
            All Status
        </option>

        <option
            value="1"
            @selected(request('status')==='1')
        >
            Active
        </option>

        <option
            value="0"
            @selected(request('status')==='0')
        >
            Inactive
        </option>

    </x-admin.select>

    <x-admin.select name="featured">

        <option value="">
            Featured?
        </option>

        <option
            value="1"
            @selected(request('featured')==='1')
        >
            Yes
        </option>

        <option
            value="0"
            @selected(request('featured')==='0')
        >
            No
        </option>

    </x-admin.select>

    <x-admin.select name="stock">

        <option value="">
            Stock
        </option>

        <option
            value="available"
            @selected(request('stock')==='available')
        >
            In Stock
        </option>

        <option
            value="low"
            @selected(request('stock')==='low')
        >
            Low Stock
        </option>

        <option
            value="out"
            @selected(request('stock')==='out')
        >
            Out of Stock
        </option>

    </x-admin.select>

</form>

    <x-admin.card>

        <x-admin.table>

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                        Image
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                        Product
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                        Category
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                        Price
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                        Stock
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                        Status
                    </th>

                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-600">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">

                @forelse($products as $product)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">

                            @if($product->images->first())

                                <img
                                    src="{{ asset('storage/' . $product->images->first()->image) }}"
                                    class="h-14 w-14 rounded-lg object-cover"
                                    alt="{{ $product->name }}"
                                >

                            @else

                                <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-gray-100 text-xs text-gray-400">
                                    No Image
                                </div>

                            @endif

                        </td>

                        <td class="px-6 py-4">

    <h3 class="font-semibold text-gray-900">
        {{ $product->name }}
    </h3>

    <p class="text-sm text-gray-500">
        SKU: {{ $product->sku }}
    </p>

    @if($product->is_featured)

        <div class="mt-2">

            <x-admin.badge variant="warning">
                ⭐ Featured
            </x-admin.badge>

        </div>

    @endif

</td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $product->category->name }}
                        </td>

                        <td class="px-6 py-4">

    @if($product->sale_price)

        <p class="text-sm text-gray-400 line-through">
            ৳{{ number_format($product->price, 2) }}
        </p>

        <p class="font-semibold text-green-600">
            ৳{{ number_format($product->sale_price, 2) }}
        </p>

    @else

        <p class="font-semibold">
            ৳{{ number_format($product->price, 2) }}
        </p>

    @endif

</td>

                        <td class="px-6 py-4">

    @if($product->stock == 0)

        <x-admin.badge variant="danger">
            Out of Stock
        </x-admin.badge>

    @elseif($product->stock <= 5)

        <x-admin.badge variant="warning">
            Low Stock ({{ $product->stock }})
        </x-admin.badge>

    @else

        <x-admin.badge variant="success">
            In Stock ({{ $product->stock }})
        </x-admin.badge>

    @endif

</td>

                        <td class="px-6 py-4">

                            @if($product->status)

                                <x-admin.badge variant="success">
                                    Active
                                </x-admin.badge>

                            @else

                                <x-admin.badge variant="danger">
                                    Inactive
                                </x-admin.badge>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <x-admin.button
                                    href="{{ route('admin.products.edit', $product) }}"
                                    variant="secondary"
                                >
                                    Edit
                                </x-admin.button>

                                <form
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST"
                                    class="delete-form"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <x-admin.button
                                        type="submit"
                                        variant="danger"
                                    >
                                        Delete
                                    </x-admin.button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="p-8">

                            <x-admin.empty-state
                                title="No Products Found"
                                description="Create your first product to start selling."
                            >

                                <x-slot:action>

                                    <x-admin.button
                                        href="{{ route('admin.products.create') }}"
                                    >
                                        + Add Product
                                    </x-admin.button>

                                </x-slot:action>

                            </x-admin.empty-state>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-admin.table>

        <div class="mt-6">
            {{ $products->links() }}
        </div>

    </x-admin.card>

</x-admin.page>

@endsection