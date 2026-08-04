@props([
    'product',
])

<x-ui.card class="mt-8">

    <div class="space-y-5 p-4">

        <h2 class="text-xl font-semibold">
            Order Summary
        </h2>

        <div class="flex items-center justify-between">

            <span class="text-gray-500">
                Unit Price
            </span>

            <span
                class="font-semibold"
                id="unit-price"
                data-price="{{ $product->currentPrice() }}"
            >
                ৳{{ number_format($product->currentPrice(), 2) }}
            </span>

        </div>

        <div class="flex items-center justify-between">

            <span class="text-gray-500">
                Quantity
            </span>

            <span
                id="summary-quantity"
                class="font-semibold"
            >
                1
            </span>

        </div>

        <hr>

        <div class="flex items-center justify-between text-lg">

            <span class="font-semibold">
                Total
            </span>

            <span
                id="summary-total"
                class="text-2xl font-bold text-blue-600"
            >
                ৳{{ number_format($product->currentPrice(), 2) }}
            </span>

        </div>

        <x-ui.button
            type="submit"
            class="w-full"
        >
            Add To Cart
        </x-ui.button>

    </div>

</x-ui.card>