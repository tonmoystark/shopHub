<x-ui.card class="sticky top-6 p-6">

    <h2 class="mb-6 text-xl font-semibold">

        Order Summary

    </h2>

    <div class="space-y-4">

        <div class="flex justify-between">

            <span class="text-gray-600">

                Subtotal

            </span>

            <span>

                ৳{{ number_format($order->subtotal, 2) }}

            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">

                Discount

            </span>

            <span>

                ৳{{ number_format($order->discount, 2) }}

            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">

                Shipping

            </span>

            <span>

                ৳{{ number_format($order->shipping, 2) }}

            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">

                Tax

            </span>

            <span>

                ৳{{ number_format($order->tax, 2) }}

            </span>

        </div>

        <hr>

        <div class="flex justify-between text-lg font-bold">

            <span>

                Total

            </span>

            <span class="text-blue-600">

                ৳{{ number_format($order->total, 2) }}

            </span>

        </div>

    </div>

    <x-ui.button
        class="mt-8 w-full"
        variant="secondary"
        :href="route('account.orders.index')"
    >
        Back to Orders
    </x-ui.button>

</x-ui.card>