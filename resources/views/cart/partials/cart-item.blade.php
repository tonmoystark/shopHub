<x-ui.card class="p-6">

    <div class="flex flex-col gap-6 md:flex-row">

        {{-- Product Image --}}
        <img
            src="{{ asset('storage/' . $item['image']) }}"
            alt="{{ $item['name'] }}"
            class="h-32 w-32 rounded-xl object-cover"
        >

        {{-- Product Details --}}
        <div class="flex-1">

            <h2 class="text-xl font-semibold">
                {{ $item['name'] }}
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                SKU: {{ $item['sku'] }}
            </p>

            <div class="mt-6 flex flex-wrap items-end gap-8">

                {{-- Unit Price --}}
                <div>

                    <p class="text-sm text-gray-500">
                        Unit Price
                    </p>

                    <p class="font-semibold">
                        ৳{{ number_format($item['unit_price'], 2) }}
                    </p>

                </div>

                {{-- Quantity --}}
                <div>

                    <p class="mb-2 text-sm text-gray-500">
                        Quantity
                    </p>

                    <form
    action="{{ route('cart.update', ['product' => $item['product_id']]) }}"
    method="POST"
    class="cart-update-form"
>

    @csrf
    @method('PATCH')

    <x-ui.quantity-selector
        name="quantity"
        :value="$item['quantity']"
        :max="$item['stock']"
    />

</form>

                </div>

                {{-- Line Total --}}
                <div>

                    <p class="text-sm text-gray-500">
                        Subtotal
                    </p>

                    <p class="font-semibold">
                        ৳{{ number_format($item['line_total'], 2) }}
                    </p>

                </div>

            </div>

        </div>

        {{-- Remove Button --}}
        <div class="flex items-start">

            <form
                action="{{ route('cart.destroy', ['product' => $item['product_id']]) }}"
                method="POST"
                class="delete-form"
            >

                @csrf
                @method('DELETE')

                <x-ui.button type="submit" variant="danger">
                    Remove
                </x-ui.button>

            </form>

        </div>

    </div>

</x-ui.card>