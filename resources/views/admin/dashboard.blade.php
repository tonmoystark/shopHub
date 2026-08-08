@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- Header --}}
    <div class="mb-8">

        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
            Dashboard
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Here's what's happening with your store today.
        </p>

    </div>


    {{-- Statistics --}}
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Products --}}
        <x-ui.card class="p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Products
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ number_format($stats['products']) }}
                    </p>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                    <i
                        data-lucide="package"
                        class="h-6 w-6"
                    ></i>

                </div>

            </div>

        </x-ui.card>


        {{-- Categories --}}
        <x-ui.card class="p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Categories
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ number_format($stats['categories']) }}
                    </p>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-purple-600">

                    <i
                        data-lucide="tags"
                        class="h-6 w-6"
                    ></i>

                </div>

            </div>

        </x-ui.card>


        {{-- Orders --}}
        <x-ui.card class="p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Orders
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ number_format($stats['orders']) }}
                    </p>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">

                    <i
                        data-lucide="shopping-bag"
                        class="h-6 w-6"
                    ></i>

                </div>

            </div>

        </x-ui.card>


        {{-- Customers --}}
        <x-ui.card class="p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Customers
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ number_format($stats['customers']) }}
                    </p>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-orange-600">

                    <i
                        data-lucide="users"
                        class="h-6 w-6"
                    ></i>

                </div>

            </div>

        </x-ui.card>

    </div>


    {{-- Revenue --}}
    <div class="mt-6">

        <x-ui.card class="p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total Revenue
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        ৳{{ number_format($stats['revenue'], 2) }}
                    </p>

                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                    <i
                        data-lucide="banknote"
                        class="h-6 w-6"
                    ></i>

                </div>

            </div>

        </x-ui.card>

    </div>


    {{-- Tables --}}
    <div class="mt-8 grid gap-8 xl:grid-cols-2">


        {{-- Recent Orders --}}
        <x-ui.card class="overflow-hidden">

            <div class="flex items-center justify-between border-b px-6 py-4">

                <div>

                    <h2 class="font-semibold text-gray-900">
                        Recent Orders
                    </h2>

                    <p class="text-sm text-gray-500">
                        Latest orders from customers
                    </p>

                </div>

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-700"
                >
                    View All
                </a>

            </div>


            @forelse($recentOrders as $order)

                <div class="flex items-center justify-between border-b px-6 py-4 last:border-b-0">

                    <div>

                        <p class="font-medium text-gray-900">
                            {{ $order->order_number }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $order->customer_name }}
                        </p>

                    </div>


                    <div class="text-right">

                        <p class="font-semibold text-gray-900">
                            ৳{{ number_format($order->total, 2) }}
                        </p>

                        <p class="text-xs text-gray-500">
                            {{ $order->created_at->diffForHumans() }}
                        </p>

                    </div>

                </div>

            @empty

                <div class="p-8 text-center">

    <i
        data-lucide="shopping-bag"
        class="mx-auto h-10 w-10 text-gray-300"
    ></i>

    <p class="mt-3 font-medium text-gray-900">
        No orders yet
    </p>

    <p class="mt-1 text-sm text-gray-500">
        Orders will appear here when customers place them.
    </p>

</div>

            @endforelse

        </x-ui.card>


        {{-- Low Stock --}}
        <x-ui.card class="overflow-hidden">

            <div class="flex items-center justify-between border-b px-6 py-4">

                <div>

                    <h2 class="font-semibold text-gray-900">
                        Low Stock Products
                    </h2>

                    <p class="text-sm text-gray-500">
                        Products that need attention
                    </p>

                </div>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-700"
                >
                    View Products
                </a>

            </div>


            @forelse($lowStockProducts as $product)

                <div class="flex items-center justify-between border-b px-6 py-4 last:border-b-0">

                    <div class="min-w-0">

                        <p class="truncate font-medium text-gray-900">
                            {{ $product->name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            SKU: {{ $product->sku }}
                        </p>

                    </div>


                    <x-ui.badge variant="warning">

                        {{ $product->stock }} left

                    </x-ui.badge>

                </div>

            @empty

                <div class="p-8 text-center">

                    <i
                        data-lucide="circle-check"
                        class="mx-auto h-10 w-10 text-green-500"
                    ></i>

                    <p class="mt-3 font-medium text-gray-900">
                        Stock looks good
                    </p>

                    <p class="mt-1 text-sm text-gray-500">
                        No products are currently low on stock.
                    </p>

                </div>

            @endforelse

        </x-ui.card>

    </div>

@endsection