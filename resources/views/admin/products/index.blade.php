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
                        SKU
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

                        <td class="px-6 py-4 font-medium">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->category->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->sku }}
                        </td>

                        <td class="px-6 py-4">
                            ${{ number_format($product->price, 2) }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->stock }}
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