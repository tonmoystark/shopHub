@props([
    'product',
])

<x-ui.card class="group overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-xl">

    {{-- Product Image --}}
    <div class="relative overflow-hidden">

        <a href="{{ route('products.show', $product) }}">

            <img
    src="{{ $product->primary_image_url }}"
    alt="{{ $product->name }}"
    class="h-64 w-full object-cover transition duration-300 group-hover:scale-105"
>

        </a>

        {{-- Featured Badge --}}
        @if($product->is_featured)

            <div class="absolute left-3 top-3">

                <x-ui.badge variant="warning">
                    Featured
                </x-ui.badge>

            </div>

        @endif

        {{-- Stock Badge --}}
        <div class="absolute right-3 top-3">

            @if($product->isInStock())

                <x-ui.badge variant="success">
                    In Stock
                </x-ui.badge>

            @else

                <x-ui.badge variant="danger">
                    Out of Stock
                </x-ui.badge>

            @endif

        </div>

    </div>

    {{-- Content --}}
    <div class="p-5">

        {{-- Category --}}
        <p class="text-sm text-gray-500">
            {{ $product->category->name }}
        </p>

        {{-- Product Name --}}
        <h3 class="mt-2 text-lg font-semibold text-gray-900">

            <a
                href="{{ route('products.show', $product) }}"
                class="hover:text-blue-600"
            >
                {{ $product->name }}
            </a>

        </h3>

        {{-- Price --}}
        <div class="mt-4 flex items-center gap-3">

            @if($product->sale_price)

                <span class="text-xl font-bold text-blue-600">

                    ৳{{ number_format($product->sale_price, 2) }}

                </span>

                <span class="text-sm text-gray-400 line-through">

                    ৳{{ number_format($product->price, 2) }}

                </span>

            @else

                <span class="text-xl font-bold text-blue-600">

                    ৳{{ number_format($product->price, 2) }}

                </span>

            @endif

        </div>

        {{-- Actions --}}
        <div class="mt-6 flex gap-3">

            <a
                href="{{ route('products.show', $product) }}"
                class="flex-1"
            >

                <x-ui.button
                    variant="secondary"
                    class="w-full"
                >
                    View
                </x-ui.button>

            </a>

            @if($product->isInStock())

                <form
                    action="{{ route('cart.store', $product) }}"
                    method="POST"
                    class="flex-1"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="quantity"
                        value="1"
                    >

                    <x-ui.button
                        type="submit"
                        class="w-full"
                    >
                        Add to Cart
                    </x-ui.button>

                </form>

            @else

                <x-ui.button
                    disabled
                    class="w-full flex-1 opacity-50 cursor-not-allowed"
                >
                    Sold Out
                </x-ui.button>

            @endif

        </div>

    </div>

</x-ui.card>