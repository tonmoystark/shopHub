<x-ui.card class="p-6">

    <h2 class="mb-6 text-xl font-semibold">
        Customer Information
    </h2>

    <div class="space-y-4">

        <div>

            <p class="text-sm text-gray-500">
                Full Name
            </p>

            <p class="font-medium">
                {{ $order->customer_name }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                Email
            </p>

            <p class="font-medium">
                {{ $order->customer_email }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                Phone
            </p>

            <p class="font-medium">
                {{ $order->customer_phone }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                Shipping Address
            </p>

            <p class="font-medium">
                {{ $order->shipping_address }}
            </p>

        </div>

        <div>

            <p class="text-sm text-gray-500">
                City
            </p>

            <p class="font-medium">
                {{ $order->city }}
            </p>

        </div>

    </div>

</x-ui.card>