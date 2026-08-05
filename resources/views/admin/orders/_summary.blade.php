<x-admin.card>

    <h2 class="mb-6 text-lg font-semibold">
        Order Summary
    </h2>

    <div class="space-y-4">

        <div class="flex justify-between">

            <span class="text-gray-600">
                Order Number
            </span>

            <span class="font-semibold">
                {{ $order->order_number }}
            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">
                Subtotal
            </span>

            <span>
                ৳{{ number_format($order->subtotal,2) }}
            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">
                Shipping
            </span>

            <span>
                ৳{{ number_format($order->shipping,2) }}
            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">
                Discount
            </span>

            <span>
                ৳{{ number_format($order->discount,2) }}
            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">
                Tax
            </span>

            <span>
                ৳{{ number_format($order->tax,2) }}
            </span>

        </div>

        <hr>

        <div class="flex justify-between text-lg font-bold">

            <span>
                Total
            </span>

            <span>
                ৳{{ number_format($order->total,2) }}
            </span>

        </div>

    </div>

</x-admin.card>