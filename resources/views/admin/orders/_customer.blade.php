<x-admin.card>

    <h2 class="mb-6 text-lg font-semibold">
        Customer Information
    </h2>

    <div class="grid gap-6 md:grid-cols-2">

        <div>

            <p class="text-sm text-gray-500">
                Customer Name
            </p>

            <p class="mt-1 font-semibold">
                {{ $order->customer_name }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                Email
            </p>

            <p class="mt-1 font-semibold">
                {{ $order->customer_email }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                Phone
            </p>

            <p class="mt-1 font-semibold">
                {{ $order->customer_phone }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                City
            </p>

            <p class="mt-1 font-semibold">
                {{ $order->city }}
            </p>

        </div>

        <div class="md:col-span-2">

            <p class="text-sm text-gray-500">
                Shipping Address
            </p>

            <p class="mt-1 font-semibold">
                {{ $order->shipping_address }}
            </p>

        </div>

    </div>

</x-admin.card>